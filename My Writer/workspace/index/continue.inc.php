<div class="books_edit">
  <style media="screen">
    .create_new{
      border: none;
      background-color: inherit;
      margin: auto;
    }
  </style>

<?php
// echo '/Project033/includes/dbh.inc.php';
// require '/Project033/includes/dbh.inc.php';
$query = "SELECT * FROM books WHERE author='$user'";
$result = mysqli_query($conn,$query);
if ($result != '') {
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
      echo '<div class="book">
              <form class="edit_form" action="editing.php" method="post">
                <input type="hidden" name="user" value="'.$user.'">
                <button type="submit" name="book" value="'.$row["title"].'"><h1><span class="bold">'.$row["title"].'</span></h1></button>
              </form>
            </div>';
    }
  }else {
    echo '
      <div class="book">
          <h2 style="margin:auto;color:red;text-align:center;">NO WORKS YET.<br>PLEASE CREATE SOME.</h2>
      </div>';
  }
}else {
  echo '
    <div class="book">
        <h2 style="margin:auto;color:red;text-align:center;">NO WORKS YET.<br>PLEASE CREATE SOME.</h2>
    </div>';
}

  ?>
</div>
