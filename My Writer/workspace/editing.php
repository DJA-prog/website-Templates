<?php require 'header.php'; ?>
<main>
  <?php
  if (isset($_POST['book']) && isset($_POST['user'])) {
    $book = $_POST['book'];
    $author = $_POST['user'];
  }else {
    $book = $_GET['book'];
    $author = $_GET['author'];
    $option = $_GET['option'];
  }
    if (isset($_POST['option'])) {
      $option = $_POST['option'];
    }

    echo '<h1 style="text-align:center;text-decoration:underline; margin-top:0;">'.$book.'</h1>';
##########################################################
    echo '<form class="chapter_select" method="post">
    <input type="hidden" name="book" value="'.$book.'">
    <input type="hidden" name="user" value="'.$user.'">';

    if (isset($_POST['option']) && $_POST['option'] == 'C') {
      echo '<input class="current_chapter" type="submit" name="option" value="C">';
    }else {
      echo '<input type="submit" name="option" value="C">';
    }

    if ($handle = opendir('../work/'.$book)) {
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
    echo '<input type="submit" name="create-chapter" value="+">';
    echo '</form>';
####################################################################
    if (isset($_POST['option']) && $_POST['option'] == 'C') {
      require './index/edit_book_info.inc.php';
    }

    $query = 'SELECT * FROM books WHERE title="'.$book.'"';
    $result = mysqli_query($conn,$query);
    if ($result != '') {
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
          if ($author != $row["author"]) {
            echo $author.' string "'.$row["author"].'" me '.$query;
            header("Location: ./workshop.php?error=notyourwork");
            exit;
          }

          if (file_exists('../work/'.$book.'/0.txt')) {
            if (isset($option) && $option !== 'C') {
              $file = '../work/'.$book.'/'.$option.'.txt';
              $handle = @fopen($file, "r");
              if ($handle == true) {
                echo '
                <form class="txt" action="./index/save_progress.php" method="post">
                  <input type="hidden" name="book" value="'.$book.'">
                  <input type="hidden" name="option" value="'.$option.'">
                  <input type="hidden" name="authur" value="'.$user.'">
                  <textarea name="text" spellcheck>'.file_get_contents($file).'</textarea><br>
                  <input type="submit" name="save" value="save">
                </form>';
                fclose($handle);
              }else {
                echo "error opening file: ".$file;
              }
            }

          }else {
            echo '<h2 style="color:red;">No content.</h2>';
          }


        }
      }
    }

    if (isset($_POST['create-chapter'])) {
      $file = "../work/".$book."/0.txt";
      $a = 0;
      while (file_exists($file)) {
        $a++;
        if (preg_match_all( "/[0-9]/", $a) < 2) {
          $a = '00'.$a;
        }
        if (preg_match_all( "/[0-9]/", $a) < 3) {
          $a = '0'.$a;
        }
        $file = '../work/'.$book.'/'.$a.'.txt';
      }
      $file = fopen($file,"w");
      fwrite($file, $a.'.txt');
      fclose($file);
    }

   ?>


</main>
