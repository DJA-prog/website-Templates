<?php
if (!isset($_SESSION['WRITERname'])) {header("Location: ../../index.php");exit;}
$user = $_SESSION['WRITERname'];
?>
<div class="popup_back">

  <div id="new_script_form">
    <span onclick="close_new_script_form()" style="cursor:pointer;">&#9747;</span>
    <form class="" action="./index/new_script_make.inc.php" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td><label for="title">Title: </label></td>
          <td><input type="text" name="title" placeholder="Imagine Dragons" required></td>
        </tr>
        <tr>
          <td><label for="genre">Genre: </label></td>
          <td><input type="text" name="genre" placeholder="Drama" required></td>
        </tr>
        <tr>
          <td><label for="cover">Cover: </label></td>
          <td><input type="file" name="cover" placeholder="Cover" accept="image/*" required></td>

        </tr>
        <tr>
          <td><label for="status">Status: </label></td>
          <td><input type="text" name="status" placeholder="Status" value="Coming Soon" required></td>
        </tr>
        <tr>
          <td><label for="date">Date: </label></td>
          <td><?php echo '<input type="date" name="date" value="'.date("Y-m-d").'" min="'.date("Y-m-d").'">';?></td>
        </tr>
      </table>
      <?php echo '<input type="hidden" name="author" value="'.$user.'">'; ?>
      <button type="submit" name="new_script-submit">Enter</button>
    </form>
  </div>
</div>

<?php
if (isset($_POST['new_script-submit'])) {
  session_start();
  $title = $_POST["title"];
  $genre = $_POST["genre"];
  $cover = $_FILES["cover"]["name"];
  $date = $_POST["date"];
  $author = $_POST["author"];
  echo $title.'<br>'.$genre.'<br>'.$cover.'<br>'.$date.'<br>'.$author;
  echo '<script type="text/javascript">document.getElementById("new_script_form").style.display = "none";</script>';
  exit;
}
