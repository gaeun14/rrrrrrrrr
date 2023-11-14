<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>기록 게시판 목록 · bookhive</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa; /* 배경색 설정 */
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .post {
            width: 19%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px #ccc;
            background-color: #fff; /* 네모상자 배경색 설정 */
        }

        .post a {
            text-decoration: none;
            color: #333;
        }

        .post img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
        }

        .post h2 {
            font-size: 16px;
            margin: 10px 0;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .buttons button {
            background-color: #f0f0f0; /* 연한 회색 배경 */
            color: #333;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .menu-button {
            position: absolute;
            top: 60px;
            right: 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .page-title {
            text-align: center;
            font-size: 18px;
            margin: 20px 0;
            color: #333; /* 주목되는 텍스트 색상 설정 */
        }
    </style>
</head>
<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">책을 좋아하는 사람들을 위한 공간</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="post.php" class="text-white">기록 게시판</a></li>
                        <li><a href="meeting/meetings.php" class="text-white">모임 게시판</a></li>
                        <li><a href="board/list.php" class="text-white">자유 게시판</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>bookhive</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<div class="page-title">
    <h1>기록 게시판 목록</h1>
</div>
<button class="menu-button" onclick="location.href='post.php'">글쓰기</button>

<div class="container">
    <!-- 게시물 목록 표시 -->
    <?php
    // 데이터베이스 연결 설정
    $conn = new mysqli("localhost", "root", "1234", "mydb");

    if ($conn->connect_error) {
        die("데이터베이스 연결 실패: " . $conn->connect_error);
    }

    // 게시물 데이터를 가져와서 표시
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<a href='post_detail.php?id=" . $row['id'] . "'>";
            echo "<img src='" . $row['image'] . "' alt='책 표지사진' width='150' height='220'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "</a>";
            echo "<div class='buttons'>";
            echo "<button>댓글</button>";
            echo "<button>좋아요</button>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "게시물이 없습니다.";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
