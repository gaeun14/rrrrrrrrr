

<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>bookhive My Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  href="mypage2.css"> 
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../logout.php" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-20 p-t-27">My Page</span>
					<div class="text-center p-t-10">
						<span class="welcome"><td><?php echo $_SESSION['mb_nick']; ?></td> 회원님 환영합니다!</span>
					</div>

					<table class="type02">
						<tr>
							<th scope="row">아이디</th>
							<td><?php echo $_SESSION['mb_id']; ?></td>
						</tr>
						<tr>
							<th scope="row">닉네임</th>
							<td><?php echo $_SESSION['mb_nick']; ?></td>
						</tr>
					</table>

					<div class="container-login100-form-btn">
						<a href="../index.php" class="login100-form-btn">홈</a> 
						<a href="../postlist.php">기록 게시판</a>
						<a href="../meeting/meetings.php">모임 게시판</a>
						<a href="../board/list.php">자유 게시판</a>
						<form action="logout.php" method="post">
    					<button type="submit" class="login100-form-btn">로그아웃</button>
						</form>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
</body>
</html>
