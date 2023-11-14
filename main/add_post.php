<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 이미지 업로드 처리
    if (!is_dir("uploads")) {
        mkdir("uploads");
    }
    
    $uploadDir = "uploads/"; // 이미지를 저장할 디렉토리
    $imagePath = $uploadDir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
        // 이미지 업로드 성공
        // $imagePath를 데이터베이스에 저장합니다.
        $conn = new mysqli("localhost", "root", "1234", "mydb");
        $title = $_POST["title"];
        $content = $_POST["content"];
        // 이미지 경로와 함께 데이터베이스에 게시물 추가
        $sql = "INSERT INTO posts (title, content, image) VALUES ('$title', '$content', '$imagePath')";

        if ($conn->query($sql) === true) {
            header("Location: postlist.php"); // postlist.php 페이지로 리디렉션
            exit; // 스크립트 실행 종료
        } else {
            echo "게시물 추가 중 오류 발생: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "이미지 업로드 중 오류 발생.";
    }
}
?>

