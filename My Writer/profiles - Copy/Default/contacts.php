<?php require './header.php';
if (!isset($_SESSION['WRITERname'])) {
  header("Location: ../../index.php");
  exit;
}
?>
<main>
  <div class="admin_info">
    <h2>Admin:</h2>
    <?php
    require '../../includes/dbh.inc.php';
    $sql ="SELECT * FROM users WHERE username='Admin'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)){
        echo '
          <ul>
          <li>Email: '.$row["email"].'</li>
          <li>Cell: '.$row["cell"].'</li>
          </ul>';
      }
    }?>
  </div>
</main>




</body>
</html>
