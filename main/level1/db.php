<?php

$db = mysqli_connect('localhost','root','1234','level1');

if(!$db)
{
    echo "db접속실패";

}
else
{
    echo"db접속성공";
}


?>