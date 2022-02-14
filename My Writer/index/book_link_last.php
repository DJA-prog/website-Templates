<div class="books">
  <link rel="stylesheet" href="./css/book_link.css">

    <?php
    require './includes/dbh.inc.php';
    $sql ="SELECT * FROM users WHERE username='".$user."'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)){
        $last_read=$row["last_read"];
        $last_chapter=$row["last_chapter"];
        if (preg_match_all( "/[0-9]/", $last_chapter) < 2) {
          $last_chapter = '00'.$last_chapter;
        }
        if (preg_match_all( "/[0-9]/", $last_chapter) < 3) {
          $last_chapter = '0'.$last_chapter;
        }
      }
    }

    // $server = $_SERVER['SERVER_ADDR'].':84';
    $query = "SELECT * FROM books WHERE title='".$last_read."'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)){
          echo '<div class="book">
                  <form class="cover_form" action="/Project033/read.php" method="post">
                    <input type="hidden" name="author" value="'.$row["author"].'">
                    <input type="hidden" name="book" value="'.$row["title"].'">
                    <input type="hidden" name="option" value="'.$last_chapter.'">
                    <button type="submit" name="read" class="book_cover"><div class="book_cove"><img src="/Project033/img/covers/'.$row["cover"].'" alt="Cover"></div></button>
                  </form>
                  <div class="book_info">
                    <form class="title_form" action="/Project033/read.php" method="post">
                      <input type="hidden" name="author" value="'.$row["author"].'">
                      <input type="hidden" name="book" value="'.$row["title"].'">
                      <input type="hidden" name="option" value="'.$last_chapter.'">
                      <button type="submit" name="read"><h3><span class="bold">'.$row["title"].'</span></h3></button>
                    </form><br>
                    <div class="book_info_ext">
                      <div>
                        <p>Last Chapter: <span class="bold">'.$last_chapter.'</span></p><br>
                        <p>Status: <span class="bold">'.$row["status"].'</span></p>
                      </div>
                      <div>
                        <p>Last updated: <span class="bold">'.$row["last_update"].'</span></p><br>
                        <form class="author_form" action="index.html" method="post">
                          <button type="button" name="button">Author: <span class="bold">'.$row["author"].'</span></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>';

      }
    }

     ?>

</div>
