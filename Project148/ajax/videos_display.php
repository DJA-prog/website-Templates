<?php
  $table = $_POST["table"];
  $id = $_POST["id"];
  $user_id = $_POST["user_id"];
  require '../includes/dbh.inc.php';
  $query = "SELECT
            	$table.*,
                rates.rate
            FROM
            	$table
            LEFT JOIN rates ON rates.rate_table = '$table' AND rates.rate_id = $table.id AND rates.user_id = $user_id
            WHERE $table.id = $id;";
  $result = mysqli_query($conn,$query);
  if (!empty($result)){
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)){
        echo '
         <table class="videos_display_ribbon">
           <tr>
             <td>
               <div class="videos_display_rate">
                 ';
                 if (empty($row['rate'])) {
                   echo '<h2 class="display_rate">0</h2>';
                 }else{
                   echo '<h2 class="display_rate">'.$row['rate'].'</h2>';
                 }
                 echo'
               </div>
             </td>
             <td>
               <div class="videos_display_title">
                 <h2 class="display_title">'.$row['name'].'</h2>
               </div>
             </td>
             <td>
               <div class="videos_display_close">
                 <h2 onclick="closeDisplay(`videos`);">X</h2>
               </div>
             </td>
           </tr>
         </table>
         <div class="videos_display_viewport">
           <video src="'.$row['location'].'" controls autoplay poster="posterimage.jpg">
             Video Not Found / or Not Compatible with your browser
           </video>
         </div>';
      }
    }else{
      echo '
      <div class="videos_display_close">
        <h2 onclick="closeDisplay(`videos`);">X</h2>
      </div>';
    }
  }else{
    echo '
    <div class="videos_display_close">
      <h2 onclick="closeDisplay(`videos`);">X</h2>
    </div>';
  }
 ?>
