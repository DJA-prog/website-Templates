<?php
  $table = $_POST["table"];
  $id = $_POST["id"];
  $user_id = $_POST["user_id"];
  require '../includes/dbh.inc.php';
  $query = "SELECT
                favourites.id
            FROM
              $table
            LEFT JOIN favourites ON favourites.favourite_table = '$table' AND favourites.favourite_id = $table.id AND favourites.user_id = $user_id
            WHERE $table.id = $id;";
  $result = mysqli_query($conn,$query);
  if (!empty($result)){
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)){
        if (!empty($row['id'])) {
          $query = "DELETE FROM favourites WHERE favourites.user_id = '".$user_id."' AND favourites.favourite_table = '".$table."' AND favourites.favourite_id = '".$id."';";
          mysqli_query($conn,$query);
          echo '&star;';
        }else{
          $query = "INSERT INTO favourites(user_id, favourite_table, favourite_id) VALUES ('".$user_id."', '".$table."','".$id."');";
          mysqli_query($conn,$query);
          echo '&bigstar;';
        }
      }
    }

  }else{
    $query = "INSERT INTO favourites(user_id, favourite_table, favourite_id) VALUES ('".$user_id."', '".$table."','".$id."');";
    mysqli_query($conn,$query);
    echo $query;
    echo '&bigstar;';
  }
 ?>
