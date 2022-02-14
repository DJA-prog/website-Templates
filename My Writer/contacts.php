<?php require './header.php'; ?>
<main>
  <?php
  if (isset($user) && $user == 'Admin') {
    echo '<table style="border:2px #000 solid;margin:auto auto;padding:5px;">
      <tr style="">
        <th>id</th>
        <th>Username</th>
        <th>Fullname</th>
        <th>Surname</th>
        <th>DOB</th>
        <th>email</th>
        <th>Cell</th>
      </tr>';
      require './includes/dbh.inc.php';
      $sql ="SELECT * FROM users";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
          echo '
            <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["username"].'</td>
            <td>'.$row["fullname"].'</td>
            <td>'.$row["surname"].'</td>
            <td>'.$row["DOB"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["cell"].'</td>
            </tr>';
        }
      }
    echo '</table>';
  }else {
    echo '
    <div class="admin_info">
      <h2>Admin:</h2>';
      require './includes/dbh.inc.php';
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
    echo '</div>';
  }
}
   ?>
</main>
<?php require './footer.php'; ?>
