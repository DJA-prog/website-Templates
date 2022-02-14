<div class="books">
  <link rel="stylesheet" href="./css/book_link.css">

<style media="screen">
  .create_new{
    border: none;
    background-color: inherit;
    margin: auto;
  }
</style>
    <?php
    $query = "SELECT * FROM books WHERE pvt='NO'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)){
        if ($row["status"] == "Coming Soon") {
          echo '<div class="book">
                  <form class="cover_form">
                    <button type="none" name="read" class="book_cover"><div class="book_cove"><img src="/Project033/img/covers/'.$row["cover"].'" alt="Cover"></div></button>
                  </form>
                  <div class="book_info">
                    <form class="title_form">
                      <button ><h3><span class="bold">'.$row["title"].'</span></h3></button>
                    </form><br>
                    <div class="book_info_ext">
                      <div>
                        <p>Genre: <span class="bold">'.$row["genre"].'</span></p><br>
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
        }else {
          echo '<div class="book">
                  <form class="cover_form" action="/Project033/read.php" method="post">
                    <input type="hidden" name="author" value="'.$row["author"].'">
                    <input type="hidden" name="book" value="'.$row["title"].'">
                    <button type="submit" name="read" class="book_cover"><div class="book_cove"><img src="/Project033/img/covers/'.$row["cover"].'" alt="Cover"></div></button>
                  </form>
                  <div class="book_info">
                    <form class="title_form" action="/Project033/read.php" method="post">
                      <input type="hidden" name="author" value="'.$row["author"].'">
                      <input type="hidden" name="book" value="'.$row["title"].'">
                      <button type="submit" name="read"><h3><span class="bold">'.$row["title"].'</span></h3></button>
                    </form><br>
                    <div class="book_info_ext">
                      <div>
                        <p>Genre: <span class="bold">'.$row["genre"].'</span></p><br>
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
    }

     ?>

</div>
