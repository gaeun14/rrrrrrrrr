<?php
    include "lib.php";

   $idx = $_GET['idx'];
   $idx = mysqli_real_escape_string($connect, $idx);
  

   $query = "delete from write_board where idx='$idx' ";

    mysqli_query($connect, $query);

    ?>
    <script>
            location.href="list.php";
    </script>
