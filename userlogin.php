<?php

session_start();
$diaryContent = "";
if (array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id'];

}
if (array_key_exists("id", $_SESSION)) {

    include("connection.php");
    $query = "SELECT diary FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
    $row = mysqli_fetch_array(mysqli_query($link, $query));
    $diaryContent = $row['diary'];
    } else {
    header("Location: index.php");
    }

include("header.php");

?>

    <nav class="navbar navbar-light bg-faded navbar-fixed-top">
        <a class="navbar-brand" href="#">My Personal Diary</a>

        <div class="float-xs-right">
            <a href="index.php?logout=1">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-box-arrow-left"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg></button>
            </a>
        </div>
    </nav>

    <div class="container-fluid" id="containerLoggedInPage">

        <textarea id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>

    </div>
    <div class="student-gif">
        <img src="student.gif" alt="Tension Free">
    </div>

    <?php include("footer.php"); ?>
