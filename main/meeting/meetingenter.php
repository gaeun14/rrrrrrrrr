<!-- meetingenter.php -->
<!DOCTYPE html>
<html>
<head>
    <title>모임 참가</title>
    <link rel="stylesheet" href="meetings.css">
</head>
<body>
    <h1>모임 참가</h1>

    <?php
    // 모임에 참가하는 코드
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["meeting_id"])) {
            $meeting_id = $_GET["meeting_id"];
            $user_name = "사용자 이름"; // 사용자 이름을 어떻게 입력할지에 따라 수정

            // 데이터베이스 연결 설정
            $conn = new mysqli("localhost", "root", "1234", "level1");

            // SQL 인젝션 방지를 위해 데이터 유형에 맞게 수정한 쿼리
            $sql = "INSERT INTO attendees (meeting_id, user_name) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $meeting_id, $user_name);
            $stmt->execute();
            $stmt->close();

            // 데이터베이스 연결 닫기
            $conn->close();

            // 모임 참가 후, 해당 모임의 참가자 목록을 표시
            echo "<h2>참가자 목록</h2>";

            // 데이터베이스 연결 설정 (다시 연결)
            $conn = new mysqli("localhost", "root", "1234", "level1");

            // 모임 참가자를 가져와 표시
            $sql = "SELECT user_name FROM attendees WHERE meeting_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $meeting_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["user_name"] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "아직 참가자가 없습니다.";
            }

            // 데이터베이스 연결 닫기
            $stmt->close();
            $conn->close();
        }
    }
    ?>

    <!-- 메인 페이지 (meetings.php)로 돌아가는 링크 추가 -->
    <a href="meetings.php">돌아가기</a>
</body>
</html>
