<?php require './header.php'; ?>
<div class="read_main">
  <?php
//chapter_select
    $book = $_POST['book'];
    $author = $_POST['author'];
    if (isset($_POST['option'])) {
      $option = $_POST['option'];
    }
    echo '<h1 style="text-align:center;text-decoration:underline; margin-top:0;">'.$book.'</h1>';
    echo '
    <form class="chapter_select" method="post">
      <input type="hidden" name="author" value="'.$_POST['author'].'">
      <input type="hidden" name="book" value="'.$_POST['book'].'">';
      if (file_exists('./work/'.$book.'/0.txt')) {
        if ($handle = opendir('./work/'.$book)) {
          while (false !== ($entry = readdir($handle))) {
              if ($entry != "." && $entry != ".." && $entry != "thumb") {
                $ext = pathinfo($entry, PATHINFO_EXTENSION);
                $without_extension = pathinfo($entry, PATHINFO_FILENAME);
                if ($ext == 'txt') {
                  if (isset($option) && $without_extension == $option ) {
                    echo '<input class="current_chapter" type="submit" name="option" value="'.$without_extension.'">';
                  }else {
                    echo '<input type="submit" name="option" value="'.$without_extension.'">';
                  }
                }

              }
          }
          closedir($handle);
        }
      }else {
        echo '<h2 style="color:red;">No content.</h2>';
      }

    echo '</form>';
//textarea
    if (isset($_POST['option'])) {
      if(isset($user)){lastread($user,$book,$_POST['option']);}
    $file = './work/'.$book.'/'.$_POST['option'].'.txt';
	  $text = file_get_contents($file);
	  $text = '<p>'.$text;
	  $text = str_replace ("\n", '</p>'."<br>".'<p>', $text);
	  $text = str_replace ('<p>'."\n".'</p>', '<br />', $text);
	  $text = str_replace ('<p></p>', '<br />', $text);
	  $text = $text.'</p>';
	  echo'<section class="textarea">'.$text.'</section>';
//style
    if (isset($user)) {
      require './includes/dbh.inc.php';
      $sql ="SELECT * FROM users WHERE username='".$user."'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
          $cell=$row["font_size"];
          echo '
          <style media="screen">
          .textarea p{
            letter-spacing: '.$row["line_space"].'px;
            font-size: '.$row["font_size"].'px;
			margin: calc('.$row["font_size"].'px/5);
          }
          .textarea br{
            margin: 0px;
            height: 10px;
          }
          </style>';
        }
      }
    }else {
      echo '
      <style media="screen">
      .textarea p{
        margin: 2px;
      }
      .textarea br{
        margin: 0px;
        height: 10px;
      }
      </style>';
    }


      //echo '<textarea style="height: 500px;width: calc(100% - 10px);font-family: sans-serif;background-color: inherit;">'.file_get_contents($file).'</textarea>';
    }
   ?>
<?php // top  ?>
   <div style="text-align: center;">
     <a href="#top" class="toTOP">TOP</a>
   </div>
</div>

<?php
function lastread($user,$book,$chapter){
  require './includes/dbh.inc.php';
  $sql ="SELECT * FROM users WHERE username='".$user."'";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
      $stmt = $conn->prepare("UPDATE users SET last_read=? WHERE username=?");
      $stmt->bind_param('ss', $book, $user);
      $stmt->execute();
      $stmt = $conn->prepare("UPDATE users SET last_chapter=? WHERE username=?");
      $stmt->bind_param('ss', $chapter, $user);
      $stmt->execute();
    }
  }
}
 ?>


<?php require './footer.php'; ?>
