<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판</title>
    <link rel="stylesheet" href="list.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">책을 좋아하는 사람들을 위한 공간</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="post.php" class="text-white">기록 게시판</a></li>
                        <li><a href="meeting/meetings.php" class="text-white">모임 게시판</a></li>
                        <li><a href="board/list.php" class="text-white">자유 게시판</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>bookhive</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>

        <h1>자유게시판</h1>
        <hr class="separator">
    </header>
    <?php
    error_reporting(1);
    ini_set("display_errors", 1);

    include "lib.php";
    ?>

    <table width=800 border="1">
        <tr>
            <th width=50 >No </th>
            <th> 제목 </th>
            <th width=100> 작성자 </th>
            <th width=90> 작성일자 </th>
        </tr> 
    <?php
        $query = "select * from write_board order by idx desc ";
        $result = mysqli_query($connect, $query);

        while($data = mysqli_fetch_array($result)){
    ?>
        <tr>
            <td><?=$data['idx']?> </td>
            <td> <a href="view.php?idx=<?=$data['idx']?>"><?=$data['title']?> </td>
            <td><?=$data['nick']?> </td>
            <td><?=substr($data['regdate'],0,10)?> </td>
    <?php } ?>


    </table>
    <a href="write.php" class="button">글쓰기</a>
</body>
</html>