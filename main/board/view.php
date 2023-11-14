<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
    
    <?php
    include "lib.php";

    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "SELECT * FROM write_board WHERE idx='$idx'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);  

?>

<form action="writePost.php" method="post">
<table width=800 border="1" cellpadding=5>
    <tr>
        <th> 닉네임 </th>
        <td> <?=$data['nick']?></td>   
    </tr> 
    <tr>
        <th> 제목 </th>
        <td> <?=$data['title']?></td>   
    </tr>
    <tr>
        <th> 내용 </th>
        <td> <?=nl2br($data['memo'])?>  
        </td>   
    </tr> 
    
    <tr>
    <td colspan="2">
           <div style="float:right; "> 
            <a href="del.php?idx=<?=$idx?>" class="button delete-button" onclick="return confirm('정말 삭제할까요?')" >삭제</a>
            </div>  
            <a href="list.php" class="button list-button">목록</a>
        </td>
    </tr>
</table>
</form>
</body>
</html>