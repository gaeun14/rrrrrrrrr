<?php 
session_start();
include('db.php'); 
if(isset($_POST['user_id']) && isset($_POST['user_pass1']))
{
	//보안 강화 
	$user_id = mysqli_real_escape_string($db, $_POST['user_id']); 
	$user_pass1 = mysqli_real_escape_string($db, $_POST['user_pass1']);  
	//에러 체크 
	
	if(empty($user_id)) 
	{ 
		header("location: login_view.php?error=아이디가 비어있습니다");
		exit();
	} 	
	else if(empty($user_pass1))
	{
		header("location: login_view.php?error=비밀번호가 비어있습니다");
		exit();	
	}	
	
	else
	{
		$sql = "select * from members where mb_id = '$user_id'";
        $result = mysqli_query($db,$sql);

        if(mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];

            if(password_verify($user_pass1, $hash))
            {
				$_SESSION['mb_nick']= $row['mb_nick'];
				$_SESSION['mb_id']= $row['mb_id'];
				$_SESSION['no']= $row['no'];

                header("location: mypage2.php");
		        exit();	
            }
            else
            {
                header("location: login_view.php?error=로그인에 실패하였습니다");
		        exit();	
            }
        }
        else
        {
            header("location: login_view.php?error=아이디가 잘못 입력되었습니다");
		    exit();	
        }
	}
}
else
{
	header("location: login_view.php?success=알 수 없는 오류가 발생했습니다");
	exit();		
}	
?>
		
	
	

	
