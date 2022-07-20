<?php
if ($_SESSION['TP_admin'] == true){
  $query = "SELECT
            	".$_GET['table'].".*
            FROM
            	".$_GET['table']."
            ORDER BY ".$_GET['table'].".name;";
}else {
  $query = "SELECT
            	".$_GET['table'].".*,
                rates.rate,
                IF(favourites.id IS NULL, '☆', '★') AS FAV
            FROM
            	".$_GET['table']."
            INNER JOIN Access ON Access.access_id = ".$_GET['table'].".id AND Access.access_table = '".$_GET['table']."' AND Access.user_id = ".$_SESSION['TP_id']."
            INNER JOIN users ON users.id = Access.user_id
            LEFT JOIN rates ON rates.rate_id = ".$_GET['table'].".id AND rates.user_id = Access.user_id AND rates.rate_table = '".$_GET['table']."'
            LEFT JOIN favourites ON favourites.user_id = Access.user_id AND favourites.favourite_id = ".$_GET['table'].".id AND favourites.favourite_table = '".$_GET['table']."'
            UNION
            SELECT
            	".$_GET['table'].".*,
                rates.rate,
                IF(favourites.id IS NULL, '☆', '★') AS FAV
            FROM
            	".$_GET['table']."
            INNER JOIN Global_access ON Global_access.global_access_id =  ".$_GET['table'].".id AND Global_access.global_access_table = '".$_GET['table']."'
            LEFT JOIN rates ON rates.rate_id = ".$_GET['table'].".id AND rates.user_id = ".$_SESSION['TP_id']." AND rates.rate_table = '".$_GET['table']."'
            LEFT JOIN favourites ON favourites.user_id = ".$_SESSION['TP_id']." AND favourites.favourite_id = ".$_GET['table'].".id AND favourites.favourite_table = '".$_GET['table']."'
            UNION
            SELECT
            	".$_GET['table'].".*,
                rates.rate,
                IF(favourites.id IS NULL, '☆', '★') AS FAV
            FROM
            	".$_GET['table']."
            INNER JOIN Creator ON Creator.create_id =  ".$_GET['table'].".id AND Creator.create_table = '".$_GET['table']." AND Creator.user_id = ".$_SESSION['TP_id']."'
            LEFT JOIN rates ON rates.rate_id = ".$_GET['table'].".id AND rates.user_id = ".$_SESSION['TP_id']." AND rates.rate_table = '".$_GET['table']."'
            LEFT JOIN favourites ON favourites.user_id = ".$_SESSION['TP_id']." AND favourites.favourite_id = ".$_GET['table'].".id AND favourites.favourite_table = '".$_GET['table']."'
            WHERE available = 1
            ORDER BY name;";
}

          // echo $query;
$result = mysqli_query($conn,$query);
if (!empty($result)){
  if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      echo '
      <div class="favourites_box">
        <data class="favourites_selection" tp_table="'.$_GET['table'].'" tp_table_id="'.$row['id'].'" tp_user_id="'.$_SESSION['TP_id'].'"></data>
        <img src="'.$row['cover_loc'].'" alt="">
        <h3 class="favourites_title" title="'.$row['name'].'">'.$row['name'].'</h3>';
        if ($_SESSION['TP_admin'] == false){ echo '
        <h3 class="favourites_favourite" title="Fav">'.$row["FAV"].'</h3>
        <h3 class="favourites_rate" title="rate">'.$row['rate'].'</h3>';
      } echo '
        <h3 class="favourites_play">PLAY</h3>
        <h3 class="favourites_edit" title="more">:</h3>
      </div>
      ';
    }
  }
}

?>
