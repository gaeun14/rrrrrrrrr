<?php 
include('db.php'); 
if(isset($_POST['user_id']) && isset($_POST['user_nick']) && isset($_POST['user_pass1']) && isset($_POST['user_pass2']))
{
	//보안 강화 
	$user_id = mysqli_real_escape_string($db, $_POST['user_id']); 
	$user_nick = mysqli_real_escape_string($db, $_POST['user_nick']); 
	$user_pass1 = mysqli_real_escape_string($db, $_POST['user_pass1']); 
	$user_pass2 = mysqli_real_escape_string($db, $_POST['user_pass2']); 

	//에러 체크 
	
	if(empty($user_id)) 
	{ 
		header("location: register_view.php?error=아이디가 비어있습니다");
		exit();
	} 
	else if(empty($user_nick))
	{
		header("location: register_view.php?error=닉네임이 비어있습니다");
		exit();	
	}	
	else if(empty($user_pass1))
	{
		header("location: register_view.php?error=비밀번호가 비어있습니다");
		exit();	
	}	
	else if(empty($user_pass2))
	{
		header("location: register_view.php?error=비밀번호확인이 비어있습니다");
		exit();	
	}	

	else if($user_pass1 !== $user_pass2)
	{
		header("location: register_view.php?error=비밀번호가 일치하지 않습니다");
		exit();	
	}
	else
	{
		//암호화
		$user_pass1 = password_hash($user_pass1, PASSWORD_DEFAULT);

		//아이디 또는 닉네임 또는 아이디와 동시에 닉네임 중복체크
		$sql_same = "select * from members where mb_id = '$user_id' and mb_nick = '$user_nick'";
		$order = mysqli_query($db, $sql_same);
		
		if(mysqli_num_rows($order) > 0)
		{
			header("location: register_view.php?error=아이디 또는 닉네임이 이미 존재합니다");
			exit();	
		}
		else
		{
			$sql_save = "insert into members(mb_id, mb_nick, password) values('$user_id', '$user_nick', '$user_pass1')";
			$result = mysqli_query($db,$sql_save);

			if($result)
			{
				header("location: register_view.php?success=성공적으로 가입되었습니다");
				exit();	
			}
			else
			{
				header("location: register_view.php?success=가입에 실패하였습니다");
				exit();	
			}	
		}
	}
}
else
{
	header("location: register_view.php?success=알 수 없는 오류가 발생했습니다");
	exit();		
}	
?>
		
	
	
