<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판</title>
    <link rel="stylesheet" href="write.css">
</head>
<body>
    
    <?php
    include "lib.php";

    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from write_board where idx='$idx'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    ?>

    <form action="writePost.php" method="post">
    <table width=800 border="1" cellpadding=5>
        <tr>
            <th> 닉네임 </th>
            <td><input type="text" name="nick" ></td>   
        </tr> 
        <tr>
            <th> 제목 </th>
            <td><input type="text" name="title" style="width:100%;" ></td>   
        </tr>
        <tr>
            <th> 내용 </th>
            <td>
                <textarea name="memo" style="width:100%; height:300px;"></textarea>

            </td>   
        </tr> 
        
        <tr>
            <td colspan="2">
                <div style="text-align:center;">
                    <input type="submit" value="저장">
                </div>
            </td>
        </tr>
    </table>
    </form>

</body>
</html>
