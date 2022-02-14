<?php
$server = $_SERVER['SERVER_ADDR'];
if (isset($_POST['new_script-submit'])) {
  session_start();
  $title = $_POST["title"];
  $genre = $_POST["genre"];
  $status = $_POST["status"];
  $cover = $_FILES["cover"]["name"];
  $date = $_POST["date"];
  $author = $_POST["author"];

  require '../../includes/dbh.inc.php';
  $sql = "SELECT title FROM books WHERE title=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../workspace.php?error=SQLcheckprep");
    exit;
  }
  else {
    mysqli_stmt_bind_param($stmt, "s", $title);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCount = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    if ($resultCount > 0) {
      header("Location: ../workspace.php?error=titleTaken");
      exit;
    }else {
      if (!file_exists("../../work/$title")) {if (!mkdir("../../work/$title")) {echo "../work/$title<hr>";}}
      $dir = "../../img/covers/";
      $tmpFilePath = $_FILES['cover']['tmp_name'];
      $ext = pathinfo($cover, PATHINFO_EXTENSION);
      $newFilePath = $dir.$title.'.'.$ext;
      if (!move_uploaded_file($tmpFilePath, $newFilePath)) {
      header("Location: ../workspace.php?error=coverupload");
      exit;
      }
      $sql = "INSERT INTO books (title, genre, `status`, last_update , first_update, author, cover) VALUES (?, ?, ?, ?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../workspace.php?error=SQLinsertprep");
        exit;
      }else {
        $cover2 = $title.'.'.$ext;
        mysqli_stmt_bind_param($stmt, "sssssss", $title, $genre, $status, $date, $date, $author, $cover2);
        echo '<hr>'.$title.'<br>'.$genre.'<br>'.$status.'<br>'.$date.'<br>'.$date.'<br>'.$author.'<br>'.$cover2.'<hr>';
        if (!mysqli_stmt_execute($stmt)) {
        header("Location: ../workspace.php?error=SQLinsert");
        exit;
        }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
  }

  echo $title.'<br>'.$genre.'<br>'.$cover.'<br>'.$date.'<br>'.$author.'<br>'.$server;
  echo '<script type="text/javascript">document.getElementById("new_script_form").style.display = "none";</script>';
  header("Location: ../workspace.php?newBookReady");
  exit;
}
?>
