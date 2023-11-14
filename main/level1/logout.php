<?php
session_start();

// 현재 세션을 파기하고 모든 세션 데이터를 삭제합니다.
$_SESSION = array();
session_destroy();

// 로그아웃 후 로그인 페이지로 리다이렉트합니다.
header("Location: login_view.php");
exit();
?>
