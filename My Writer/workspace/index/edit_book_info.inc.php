<div class="edit_book_info">
  <label for="cover">Cover: </label><br>
  <?php $cover_row = mysqli_fetch_row(mysqli_query($conn,'SELECT cover FROM books WHERE title="'.$book.'"'));
  echo '<img class="cover" src="../img/covers/'.$cover_row[0].'" alt="">'; ?><br>
  <form class="update_cover" action="./index/updating_book_info.php" method="post" enctype="multipart/form-data">
    <?php echo '
    <input type="hidden" name="book" value="'.$book.'">
    <input type="hidden" name="author" value="'.$author.'">
    <input type="hidden" name="option" value="'.$option.'">';?>
    <label for="cover">Update Cover: </label>
    <input type="file" name="bookcover[]" accept="image/*" required>
    <input type="submit" name="update_cover" value="Update">
  </form>
  <hr>
  <form class="update_title" action="./index/updating_book_info.php" method="post">
    <?php echo '
    <input type="hidden" name="book" value="'.$book.'">
    <input type="hidden" name="author" value="'.$author.'">
    <input type="hidden" name="option" value="'.$option.'">';?>
    <label for="cover">Update Title: </label>
    <?php echo '<input type="text" name="newTitle" value="'.$book.'" required>';?>
    <input type="submit" name="update_title" value="Update">
  </form>
  <hr>
  <form class="update_status" action="./index/updating_book_info.php" method="post">
    <?php echo '
    <input type="hidden" name="book" value="'.$book.'">
    <input type="hidden" name="author" value="'.$author.'">
    <input type="hidden" name="option" value="'.$option.'">';?>
    <label for="status">Update Status: </label>
    <?php $status_row = mysqli_fetch_row(mysqli_query($conn,'SELECT status FROM books WHERE title="'.$book.'"'));
    echo '
    <select class="" name="status" required>
      <option value="'.$status_row[0].'">'.$status_row[0].'</option>
      <option value="Coming Soon">Coming Soon</option>
      <option value="Ongoing">Ongoing</option selected>
      <option value="Break">Break</option>
      <option value="On-hold">On-hold</option>
      <option value="Complete">Complete</option>
    </select>'; ?>
    <input type="submit" name="update_status" value="Update">
  </form>
  <hr>
  <form class="update_genre" action="./index/updating_book_info.php" method="post">
    <?php echo '
    <input type="hidden" name="book" value="'.$book.'">
    <input type="hidden" name="author" value="'.$author.'">
    <input type="hidden" name="option" value="'.$option.'">';?>
    <label for="genre">Update Genre: </label>
    <?php $genre_row = mysqli_fetch_row(mysqli_query($conn,'SELECT genre FROM books WHERE title="'.$book.'"'));
    echo '<input type="text" name="genre" value="'.$genre_row[0].'" required>'; ?>
    <input type="submit" name="update_genre" value="Update">
  </form>
</div>

<!--
title
genre
status
cover
$sql = 'UPDATE books SET pvt="'.$pvt.'" WHERE title="'.$who.'"';
if (!mysqli_query($conn,$sql)) {
  echo "PVT update error: $sql";
}
-->
