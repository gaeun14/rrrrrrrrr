<!-- meetinglist.php -->
<!DOCTYPE html>
<html>
<head>
    <title>모임 목록</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        h2 {
            font-size: 1.2em;
            margin: 20px 0 10px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .meeting-box {
            background-color: #ffffff;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .meeting-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>모임 목록</h1>
    <div class="container">
    <?php
    // 데이터베이스 연결 설정 (mysqli를 사용)
    $conn = new mysqli("localhost", "root", "1234", "level1");

    // 오류 처리
    if ($conn->connect_error) {
        die("연결 실패: " . $conn->connect_error);
    }

    // 데이터베이스에서 회의 목록을 가져옵니다.
    $sql = "SELECT * FROM meetings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "모임 제목: " . $row["title"] . "<br>";
            echo "날짜 및 시간: " . $row["date_time"] . "<br>";
            echo "주최자: " . $row["organizer"] . "<br>";
            echo "모임 장소:". $row["location"]."<br>";
            
        }
    } else {
        echo "등록된 모임이 없습니다.";
    }

    // 데이터베이스 연결 닫기
    $conn->close();
    ?>

    <div class="meeting-actions">
            <a href="meetingenter.php">참가</a>
            <a href="meetings.php">돌아가기</a>
        </div>
    </div>
</body>
</html>
