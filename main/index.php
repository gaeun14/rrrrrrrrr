<?php
session_start();

// 만약 세션에 사용자 정보가 저장되어 있다면, 로그인 상태로 간주
if (isset($_SESSION['mb_nick'])) {
    $userNickname = $_SESSION['mb_nick'];
    $userId = $_SESSION['mb_id'];
    // 기타 사용자 정보 가져오기
    // ...
} else {
    // 세션에 사용자 정보가 없는 경우, 로그인되지 않은 상태
}
?>


<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Album example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      

      @media (min-width: 780px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>

<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted"> 책을 좋아하는 사람들을 위한 공간 </p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">

          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="postlist.php" class="text-white">기록 게시판</a></li>
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
</header>

<main>
      <section class="py-5 text-center container">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">bookhive</h1>
            <ul class="list-unstyled">
                <?php
                if (isset($_SESSION['mb_nick'])) {
                    // 사용자가 로그인한 경우
                    echo '<li><a href="level1/mypage2.php" class="btn btn-primary my-2">마이페이지</a></li>';
                } else {
                    // 사용자가 로그인하지 않은 경우
                    echo '<li><a href="level1/register_view.php" class="btn btn-primary my-2">가입하기</a></li>';
                    echo '<li><a href="level1/login_view.php" class="btn btn-secondary my-2">로그인</a></li>';
                }
                ?>
            </ul>
        </div>
      </section>
 

    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        
        $servername = "localhost"; // MySQL 서버 주소
        $username = "root"; // MySQL 사용자 이름
        $password = "1234"; // MySQL 비밀번호
        $dbname = "mydb"; // 사용할 데이터베이스 이름
        
        // MySQL 데이터베이스에 연결
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("연결 실패: " . $conn->connect_error);
        }
        
        // 쿼리 작성 - 예를 들어, 'books' 테이블에서 정보를 가져오는 쿼리
        $sql = "SELECT image, id, title FROM posts";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
        ?>
        
        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
            <img src="<?php echo $row["image"]; ?>" alt="책 표지사진" width="210" height="300">
        </div>
        <div class="card-body">
            <p class="card-text">닉네임: <?php echo $row["id"]; ?><br>제목: <?php echo $row["title"]; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">1</small>
              </div>
            </div>
          </div>  
        </div>
        <?php
              }
          } else {
              echo "0개의 결과";
          }

          $conn->close(); // 데이터베이스 연결 닫기
          ?>


        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
              <img src="book2.jpeg" alt="책 표지사진" width="210" height="300">
              </div>
            <div class="card-body">
              <p class="card-text">닉네임: 가은 <br> 제목: 구의 증명</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">2</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
              <img src="book3.jpeg" alt="책 표지사진" width="210" height="300">
              </div>
            <div class="card-body">
              <p class="card-text">닉네임: 깨은 <br> 제목: 불편한 편의점</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">3</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
              <img src="book4.jpeg" alt="책 표지사진" width="210" height="300">
              </div> 
            <div class="card-body">
              <p class="card-text">닉네임: 깨은 <br> 제목: 하얼빈</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">4</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
              <img src="book5.jpeg" alt="책 표지사진" width="210" height="300">
              </div>
              <div class="card-body">
              <p class="card-text">닉네임: 책이조아 <br> 제목: 아버지의 해방일지 </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">5</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
              <img src="book6.jpeg" alt="책 표지사진" width="210" height="300">
              </div>
            <div class="card-body">
              <p class="card-text">닉네임: 북북 <br> 제목: 체리새우 </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">6</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
              <img src="book7.jpeg" alt="책 표지사진" width="210" height="300">
              </div>
            <div class="card-body">
              <p class="card-text"> 닉네임: 책벌레 <br> 제목: 보이지 않는 곳에서 애쓰고 있는 너에게</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">7</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
              <img src="book8.jpeg" alt="책 표지사진" width="210" height="300">
              </div>
            <div class="card-body">
              <p class="card-text">닉네임: 종이냄새 <br> 제목: 작별인사</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">8</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col text-center">
          <div class="card shadow-sm">
            <div class="mx-auto">
              <img src="book9.jpeg" alt="책 표지사진" width="210" height="300">
              </div>
            <div class="card-body">
              <p class="card-text">닉네임: 잇힝 <br> 제목: 이기적 유전자</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">댓글</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">좋아요</button>
                </div>
                <small class="text-muted">9</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.1/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>