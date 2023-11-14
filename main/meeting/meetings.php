<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>모임 게시판</title>
    <style>
        /* 위에서 제시한 CSS 스타일을 여기에 붙여넣으세요 */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1, h2 {
            text-align: center;
            color: #333;
            margin: 10px 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            margin: 10px auto;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .meeting-list {
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            margin: 10px auto;
            max-width: 600px;
        }

        .meeting-list a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 10px;
        }

        .meeting-list a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>모임 게시판</h1>
    <?php if (isset($_SESSION['mb_id'])) { ?>
        <!-- 세션이 존재한다면, 새 모임 만들기 양식 표시 -->

    <h2>새 모임 만들기</h2>
    <form action="meetings.php" method="post">
        <label for="title">모임 제목:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="description">모임 설명:</label>
        <textarea id="description" name="description"></textarea><br>
        <label for="date_time">날짜 및 시간:</label>
        <input type="datetime-local" id="date_time" name="date_time" required><br>
        <label for="organizer">주최자:</label>
        <input type="text" id="organizer" name="organizer" required><br>
        <label for="location">모임 장소:</label>
        <input type="text" id="location" name="location"><br>
        <input type="submit" value="모임 만들기">
    </form>

    <h2>모임 목록</h2>
    <a href="meetinglist.php">모임 목록 보기</a>
    
    <h2>모임 참가</h2>
    <a href="meetingenter.php">모임 참가하기</a>

    <?php } else { ?>
        <!-- 세션이 없다면, 로그인 메시지 표시 -->
        <p style="text-align: center; color: #000; font-weight: bold;">모임을 만들려면 로그인이 필요합니다.</p>
    <?php } ?>
</body>
</html>
