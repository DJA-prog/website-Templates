<?php
include './includes/dbh.inc.php';
$query = "SELECT * FROM books WHERE pvt='NO'";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)){
    echo $row["id"].' : '.$row['title'].' : '.$row['genre'].' : '.$row['status'].' : '.$row['last_update'].' : '.$row['first_update'].' : '.$row['author'].' : '.$row['cover'].' : '.$row['pvt'].'<hr>';
    if ($row["status"] == "Coming Soon") {
      echo $row['title'].' : '.$row['status'].'<hr>';
    }
  }
}

 ?>
