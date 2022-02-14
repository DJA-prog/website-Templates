<?php
if (isset($_POST['save'])) {
  $book = $_POST['book'];
  $chapter = $_POST['option'];
  $user = $_POST['authur'];
  $text = $_POST['text'];

  $file = '../../work/'.$book.'/'.$chapter.'.txt';
  $handle = @fopen($file, "w");
  if (!fwrite($handle, $text)) {
    header("Location: ../editing.php?error=fwrite");
    exit;
  }
  fclose($handle);
  require '../../includes/dbh.inc.php';
  $date = date("Y-m-d");
  $sql = 'UPDATE books SET last_update="'.$date.'" WHERE title="'.$book.'"';
  if (!mysqli_query($conn,$sql)) {
    echo "Last_Updated update error: $sql";
  }
  header("Location: ../editing.php?saved&book=".$book."&author=".$user."&option=".$chapter);
  exit;
}



 ?>
