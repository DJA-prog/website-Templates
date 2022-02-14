<?php require './header.php';?>
<main>
<table style="border:2px #000 solid;margin:auto auto;padding:5px;">
  <tr>
    <th>id</th>
    <th>Username</th>
    <th>Fullname</th>
    <th>Surname</th>
    <th>DOB</th>
    <th>email</th>
    <th>Cell</th>
    <th>Bio</th>
    <th>Profile img</th>
    <th>Delete User</th>
  </tr>
  <?php
  require '../../includes/dbh.inc.php';
  $sql ="SELECT * FROM users";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
      $usernow = $row["username"];
      $string = strip_tags($row["bio"]);
      if (strlen($string) > 100) {

          // truncate string
          $stringCut = substr($string, 0, 100);
          $endPoint = strrpos($stringCut, ' ');

          //if the string doesn't contain any space then it will cut without word basis.
          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
          $string .= '...';
      }
      echo '
        <tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["username"].'</td>
        <td>'.$row["fullname"].'</td>
        <td>'.$row["surname"].'</td>
        <td>'.$row["DOB"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["cell"].'</td>
        <td>'.$string.'</td>
        <td>'.$row["profile_img"].'</td>';

        if ($usernow !== "Admin") {
          echo '<td><form action="../../index/delete_manage.inc.php" method="post"><input type="hidden" name="user" value="'.$usernow.'">
                <button type="submit" name="login-submit" style="cursor:pointer;">Delete</button></form></td>';
        }
        echo '</tr>';
    }
  }
  mysqli_close($conn);
   ?>

</table>
</main>




</body>
</html>
