<div class="books">
  <style media="screen">
    .create_new{
      border: none;
      background-color: inherit;
      margin: auto;
    }
  </style>

  <div class="book">
      <button class="create_new" onclick="new_script()" ><h1><span class="bold">CREATE NEW WORK</span></h1></button>
  </div>
<?php
// require '/Project033/includes/dbh.inc.php';
$query = "SELECT * FROM books WHERE author='$user'";
$result = mysqli_query($conn,$query);
if ($result != '') {
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
      echo '<div class="book">
              <form class="cover_form" action="../read.php" method="post">
                <input type="hidden" name="author" value="'.$row["author"].'">
                <input type="hidden" name="book" value="'.$row["title"].'">
                <button type="submit" name="book-link" class="book_cover"><div class="book_cove"><img src="../img/covers/'.$row["cover"].'" alt="Cover"></div></button>
              </form>
              <div class="book_info">
                <form class="title_form" action="../read.php" method="post">
                  <input type="hidden" name="author" value="'.$row["author"].'">
                  <input type="hidden" name="book" value="'.$row["title"].'">
                  <button type="submit" name="button"><h3><span class="bold">'.$row["title"].'</span></h3></button>
                </form>
                <br>
                <div class="book_info_ext">
                  <div>
                    <p>Genre: <span class="bold">'.$row["genre"].'</span></p><br>
                    <p>Status: <span class="bold">'.$row["status"].'</span></p>
                  </div>
                  <div>
                    <form class="pvt_form" action="./index/pvt.php" method="post">
                      <input type="hidden" name="who" value="'.$row["title"].'">';
                      if ($row["pvt"] == 'YES') {
                        echo '<p style="margin:0;">Set as: <button type="submit" name="pvt" value="NO"><h4 style="margin:0;"><span class="bold">PRIVATE</span></h4></button></p>';
                      }else {
                        echo '<p style="margin:0;">Set as: <button type="submit" name="pvt" value="YES"><h4 style="margin:0;"><span class="bold">PUBLIC</span></h4></button></p>';
                      };
                      echo'
                    </form><br>
                    <p>Author: <span class="bold">'.$row["author"].'</span></p><br>
                  </div>
                </div>
              </div>
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


   /*
if ($handle = opendir('../profiles/'.$user.'/work/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
          $ext = pathinfo($entry, PATHINFO_EXTENSION);
          if ($ext == '') {
            //echo '<a href="../profiles/'.$user.'/work/'.$entry.'"><img src="../profiles/'.$user.'/work/'.$entry.'/'.$entry.'.jpg"><p>'.$entry.'</p></a><br>';
            echo '<div class="book">
                  <form class="cover_form" action="index.html" method="post">
                    <button type="submit" name="book-link" class="book_cover"><div class="book_cove"><img src="../profiles/'.$user.'/work/'.$entry.'/'.$row["cover"].'" alt="Cover"></div></button>
                  </form>
                  <div class="book_info">
                    <form class="title_form" action="index.html" method="post">
                      <button type="button" name="button"><h3><span class="bold">'.$entry.'</span></h3></button>
                    </form><br>
                    <div class="book_info_ext">
                      <div>
                        <p>Genre: <span class="bold">'.$row["genre"].'</span></p><br>
                        <p>Status: <span class="bold">'.$row["status"].'</span></p>
                      </div>
                      <div>
                        <p>Last updated: <span class="bold">'.$row["last_update"].'</span></p><br>
                        <form class="author_form" action="index.html" method="post">
                          <button type="button" name="button">Author: <span class="bold">'.$user.'</span></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>';
          }
        }
    }
  closedir($handle);
  }*/
  ?>
</div>
