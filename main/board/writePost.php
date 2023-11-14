<?php
include "lib.php";


$nick = $_POST['nick'];
$title = $_POST['title'];
$memo = $_POST['memo'];


$nick = mysqli_real_escape_string($connect, $nick);
$title = mysqli_real_escape_string($connect, $title);
$memo = mysqli_real_escape_string($connect, $memo);


$regdate = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$query = "INSERT INTO write_board (nick, title, memo, regdate, ip) VALUES ('$nick', '$title', '$memo', '$regdate', '$ip')";

mysqli_query($connect, $query);

header("Location: list.php"); // 리스트 페이지로 이동
?>
