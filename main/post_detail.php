
<!DOCTYPE html>
<html>
<head>
    <title>게시물 상세 내용</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        p {
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>게시물 상세 내용</h1>

    <div class="container">
        <?php
        // 게시물 ID를 URL에서 가져오기
        $post_id = $_GET['id'];

        // 데이터베이스 연결 설정
        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = '1234';
        $db_name = 'mydb';

        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // 해당 게시물 가져오기
        $sql = "SELECT * FROM posts WHERE id = $post_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<img src='" . $row['image'] . "' alt='책 표지사진' width='210' height='300'>";
            echo "<p>" . $row['content'] . "</p>";
        } else {
            echo "게시물을 찾을 수 없습니다.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
