<div class="favourites">
  <?php
    $query = "SELECT
              	favourites.favourite_table
              FROM
              	favourites
              INNER JOIN Access ON Access.user_id = favourites.user_id AND  Access.access_table = favourites.favourite_table AND Access.access_id = favourites.favourite_id
              WHERE favourites.user_id = ".$_SESSION['TP_id']."
              GROUP BY favourites.favourite_table ORDER BY favourites.favourite_table;";
    $result = mysqli_query($conn,$query);
    if (!empty($result)){
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
          echo '<h3>'.$row[0].'</h3> <div class="favourites_group">';
          $query1 =  "SELECT
                      	favourites.*,
                          ".$row[0].".name,
                          ".$row[0].".cover_loc,
                          rates.rate
                      FROM
                      	favourites
                      INNER JOIN Access ON Access.user_id = favourites.user_id AND  Access.access_table = favourites.favourite_table AND Access.access_id = favourites.favourite_id AND favourites.favourite_table = '".$row[0]."'
                      LEFT JOIN ".$row[0]." ON ".$row[0].".id = favourites.favourite_id
                      LEFT JOIN rates ON rates.rate_id = favourites.favourite_id AND rates.user_id = favourites.user_id AND rates.rate_table = '".$row[0]."'
                      WHERE favourites.user_id = ".$_SESSION['TP_id']." ORDER BY ".$row[0].".name;";
          $result1 = mysqli_query($conn,$query1);
          if (!empty($result1)){
            if (mysqli_num_rows($result1) > 0) {
              while($row1 = mysqli_fetch_array($result1)){
                echo '
                <div class="favourites_box">
                  <data class="favourites_selection" tp_table="'.$row1['favourite_table'].'" tp_table_id="'.$row1['favourite_id'].'" tp_user_id="'.$_SESSION['TP_id'].'"></data>
                  <img src="'.$row1['cover_loc'].'" alt="">
                  <h3 class="favourites_title" title="'.$row1['name'].'">'.$row1['name'].'</h3>
                  <h3 class="favourites_favourite">&bigstar;</h3>
                  ';
                  if (empty($row1['rate'])) {
                    echo '<h3 class="favourites_rate">0</h3>';
                  }else{
                    echo '<h3 class="favourites_rate">'.$row1['rate'].'</h3>';
                  }
                  echo'
                  <h3 class="favourites_play">PLAY</h3>
                  <h3 class="favourites_edit">:</h3>
                </div>
                ';
              }
            }
          }
          echo "</div><br>";
        }
      }
    }


   ?>


</div>
