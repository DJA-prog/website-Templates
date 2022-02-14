<?php
session_start();
require '../../includes/dbh.inc.php';
echo $book = $_POST['book'];
echo $author = $_POST['author'];
echo $option = $_POST['option'];
echo "<hr>";
if (isset($_POST['update_cover'])) {
  $filename = $_FILES['bookcover']['name'][0];
  $tempname = $_FILES['bookcover']['tmp_name'][0];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  $fileNameNew = $book.".".$ext;
  $target = '../../img/covers/' . $fileNameNew;

  $query1 = 'SELECT cover FROM books WHERE title="'.$book.'"';
  $result = mysqli_query($conn, $query1);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $cover_img = $row['cover'];
      unlink('../../img/covers/'.$cover_img);
    }
  }else {
    echo $query1;
  }
  $query2 = 'UPDATE books SET cover="'.$fileNameNew.'" WHERE title="'.$book.'"';
  mysqli_query($conn, $query2);

  if (!move_uploaded_file($tempname, $target)) {
    echo "upload error";
  }
}

if (isset($_POST['update_title'])) {
  $newTitle = $_POST['newTitle'];
  $stmt = $conn->prepare("UPDATE books SET title=? WHERE title=?");
  $stmt->bind_param('ss', $newTitle, $book);
  $stmt->execute();
  rename('../../work/'.$book, '../../work/'.$newTitle);
}

if (isset($_POST['update_status'])) {
  $status = $_POST['status'];
  $stmt = $conn->prepare("UPDATE books SET status=? WHERE title=?");
  $stmt->bind_param('ss', $status, $book);
  $stmt->execute();
}

if (isset($_POST['update_genre'])) {
  $genre = $_POST['genre'];
  $stmt = $conn->prepare("UPDATE books SET genre=? WHERE title=?");
  $stmt->bind_param('ss', $genre, $book);
  $stmt->execute();
}

if (isset($newTitle) && $newTitle != $book) {
  header("Location: ../editing.php?book=".$newTitle."&option=".$option."&author=".$author);
}else {
  header("Location: ../editing.php?book=".$book."&option=".$option."&author=".$author);
}


 ?>
