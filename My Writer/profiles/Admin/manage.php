<?php
  session_start();
  require "../../includes/dbh.inc.php";
  $server  = $_SERVER['SERVER_ADDR'];
  if (!isset($_SESSION['WRITERname']) && $_SESSION['WRITERname'] != 'Admin') {
    header("location: ../../index.php");
    exit;
  }
  if (isset($_SESSION['WRITERname'])) {$user = $_SESSION['WRITERname'];}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/contacts.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/HMF.css">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/links.css">
    <link rel="stylesheet" href="../../css/manage.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="icon" href="../../img/writer_icon.png">
    <script src="../../scripts/main.js" charset="utf-8"></script>
    <title>MY Page</title>
  </head>

  <body>
    <header>
      <div class="header">
        <div class="Logo">
          <img src="../../img/writer_icon.png">
        </div>

        <div class="navbar">
          <div id="narrow">
            <div class="dropdown">
            <button class="dropbtn" onclick="myFunction()">Menu</button>
            <div class="dropdown-content" id="myDropdown">
              <a href="../../index.php">Home</a>
              <a href="../../contacts.php">Contact</a>
              <a href="./manage.php">Manage</a>
              <a href="../../workspace/workspace.php">Workspace</a>
              <a href="../../profile.php">Profile</a>
            </div>
            </div>
          </div>
          <div id="broad">
            <a href="../../index.php">Home</a>
            <a href="../../contacts.php">Contact</a>
            <a href="./manage.php">Manage</a>
            <a href="../../workspace/workspace.php">Workspace</a>
            <a href="../../profile.php">Profile</a>
          </div>
        </div>

        <div class="Profile">
          <div class="Username">
            <?php echo '<p>User: '.$user.'</p>'; ?>
          </div>
          <div id="logout">
            <span onclick="logout_close()" style="cursor:pointer;">&times;</span>
            <div class="Username" style="text-align:center;">
              <?php echo '<p>Do you want to logout from:</P><br><p> '.$_SESSION['WRITERname'].'</p>';?>
            </div>
            <form action="../../includes/logout.inc.php" method="post" style="text-align:center;">
              <button type="submit" name="login-submit" style="cursor:pointer;" class="logout">Logout</button>
            </form>
          </div>
          <div class="Profile_image">
            <?php
            $query = "SELECT profile_img FROM users WHERE username='$user';";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $profile_img = $row['profile_img'];
                echo '<img src="/img/profile_img/'.$profile_img.'" id="Profile_image" onclick="logout()" style="cursor:pointer;">';
              }
            }else {
              echo $query;
            }
             ?>
          </div>
        </div>
      </div>
    </header>
<main>
<table style="border:2px #000 solid;margin:auto auto;padding:5px;">
  <tr>
    <th>id</th>
    <th>Username</th>
    <th>Fullname</th>
    <th>Surname</th>
    <th>email</th>
    <th>Cell</th>
    <th>Delete User</th>
  </tr>
  <?php
  require '../../includes/dbh.inc.php';
  $sql ="SELECT * FROM users";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
      $usernow = $row["username"];

      echo '
        <tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["username"].'</td>
        <td>'.$row["fullname"].'</td>
        <td>'.$row["surname"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["cell"].'</td>';

        if ($usernow !== "Admin") {
          echo '<td><form action="../../index/delete_manage.inc.php" method="post">
                <input type="hidden" name="user" value="'.$usernow.'">
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
