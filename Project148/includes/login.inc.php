<?php
  GLOBAL $wrongPassCount;
  require 'dbh.inc.php';

function wrongDetails(){
// get wrong password count
    require 'dbh.inc.php';
    $sql ="SELECT * FROM websiteData WHERE fieldName='wrongPassCount'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)){
        $wrongPassCount = $row['value'];
      }
    }
    $wrongPassCount++;
    printf($wrongPassCount);
    $sql = "UPDATE websiteData SET value='$wrongPassCount' WHERE fieldname='wrongPassCount'";
    $conn->query($sql);
    mysqli_close($conn);
}

if (isset($_POST["submit_login"])) {
  $uid = $_POST["username"];
  $passwd = $_POST["password"];

// check if fields are empty
  if (empty($uid) || empty($passwd)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }else{

// close site if wrongPassCount exceeds 4

    if ($wrongPassCount > 4) {
      echo "you exceeded login fails limit";
      mysqli_close($conn);
      header("Location: ../index.php?error=sitelocked");
      exit();
    }
// prepare check username and password
    $sql = "SELECT * FROM users WHERE username=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlstatement");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "ss", $uid, $uid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)){

// verify password
        $pwdCheck = password_verify($passwd, $row['password']);
        if ($pwdCheck == false) {
          wrongDetails();
          header("Location: ../index.php?error=wrongpwd");
          exit();

        }elseif ($pwdCheck == true) {
          session_start();
          $_SESSION['TP_id'] = $row['id'];
          $_SESSION['TP_logged_in'] = true;
          $_SESSION['TP_username'] = $row['username'];
          $_SESSION['TP_welcomed'] = false;
          mysqli_stmt_close($stmt);
            $return1 = mysqli_query($conn,"SELECT * FROM websiteData WHERE id=12");
            $row1 = mysqli_fetch_array($return1);
            $_SESSION['TP_websiteRoot'] = $row1['value'];
            
            $return1 = mysqli_query($conn,"SELECT * FROM websiteData WHERE id=2");
            $row1 = mysqli_fetch_array($return1);
            if($row1['value'] == $uid){
              $_SESSION['TP_admin'] = true;
            }else{
              $_SESSION['TP_admin'] = false;
            }
            mysqli_close($conn);
          header("Location: ../index.php?login=success");
          exit();
        }else {
          header("Location: ../index.php?error=wronguidpwd");
          exit();
        }
      }else {
        wrongDetails();
        header("Location: ../index.php?error=wronguid");
        exit();
      }

    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}else{
  header("Location: ../index.php?error=submit");
  exit;
}
 ?>
