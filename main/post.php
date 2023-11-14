<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['mb_id'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $keyword = $_POST['keyword'];
    $user_id = $_SESSION['mb_id'];

    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '1234';
    $db_name = 'mydb';

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO posts (title, content, keyword, user_id) VALUES ('$title', '$content', '$keyword', '$user_id')";

    if (mysqli_query($conn, $sql)) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>기록 게시판</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            max-width: 600px; /* 수정: 폼의 최대 너비 설정 */
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            display: flex;
        }

        .image-container {
            width: 200px;
            height: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            margin-right: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            max-width: 100%; /* 이미지의 최대 너비 설정 */
            max-height: 100%; /* 이미지의 최대 높이 설정 */
        }

        form {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>기록 게시판</h1>
    <div class="container">
    <?php if (isset($_SESSION['mb_id']))  {?>
        <!-- 세션이 존재한다면, 글 작성 양식 표시 -->
        <h2>나의 기록 작성</h2>
        <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="image-container">
                    <!-- 이미지 미리보기 -->
                    <img id="image-preview" src="#" alt="미리보기">
                </div>
                <label for="title">책 제목:</label>
                <input type="text" name="title" required><br>
                <label for="content">나의 감상평:</label>
                <textarea name="content" required></textarea><br>
                <label for="keyword">관련 키워드를 선택해주세요:</label>
                <select name="keyword" id="keyword">
                    <option value="소설/시">소설/시</option>
                    <option value="IT">IT</option>
                    <option value="경제/경영">경제/경영</option>
                    <option value="사회">사회</option>
                    <option value="과학">과학</option>
                    <option value="디자인">디자인</option>
                    <option value="자기계발">자기계발</option>
                    <option value="여행">여행</option>
                    <!-- 다른 키워드 옵션들을 추가하세요 -->
                </select><br>
                <label for="image">책 이미지:</label>
                <input type="file" name="image" accept="image/*" onchange="previewImage()"><br>
                <input type="submit" value="게시물 추가">
                <form action="add_post.php" method="post" enctype="multipart/form-data">
                </form>
            </form>
        </div>
        <?php } else { ?>
        <!-- 세션이 없다면, 로그인 메시지 표시 -->
        <p>글을 쓰려면 로그인이 필요합니다. </p>
    <?php } ?>
    </div>
    <script>
        function previewImage() {
            var fileInput = document.querySelector('input[type="file"]');
            var imagePreview = document.querySelector('#image-preview');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function() {
                imagePreview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
            }
        }
    </script>
</body>
</html>