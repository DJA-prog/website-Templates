<?php require './header.php';
if (!isset($_SESSION['WRITERname'])) {
  header("Location: ../../index.php");
  exit;
}?>
<main>
  <form class="upload" action="../../index/upload.inc.php" method="post" enctype="multipart/form-data">
    <label for="type">Type of upload:</label><br>
    <select id="type" name="dir" style="cursor:pointer;">
      <?php echo '
      <option value="/videos/">Videos</option>
      <option value="/images/">Images</option>
      <option value="/documents/">Documents</option>
      ';
       ?>
    </select><br>
    <label for="file">File:</label><br>
    <input type="file" name="file[]" id="file" multiple style="cursor:pointer;">
    <button type="submit" name="upload-submit">Upload</button>
  </form><hr>
  <div class="dircontent" style="display: grid;grid-template-columns: 33.3% 33.3% 33.3%;">
    <div class="Dir content">
      <h2>Images Directory (view):</h2>
      <?php
        if ($handle = opendir('./images')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
              $ext = pathinfo($entry, PATHINFO_EXTENSION);
              $without_extension = pathinfo($entry, PATHINFO_FILENAME);
              if ($ext == 'jpg'||$ext == 'png'||$ext == 'jpeg') {
                echo '<div style="display:flex;"><a href="./Images/'.$entry.'"><img src="./Images/'.$entry.'" style="width:100px;height:100px;"></a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="images/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }elseif ($ext == 'mp4'||$ext == 'avi'||$ext == 'wmp') {
                echo '<div style="display:flex;">Video: <a href="./Images/'.$entry.'">'.$entry.' </a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="images/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }else {
                echo '<div style="display:flex;">File: <a href="./Images/'.$entry.'">'.$entry.' </a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="images/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }

            }
        }
        closedir($handle);
        }
       ?>
    </div>
    <div class="Dir content">
      <h2>Videos Directory (view):</h2>
      <?php
        if ($handle = opendir('./videos')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
              $ext = pathinfo($entry, PATHINFO_EXTENSION);
              $without_extension = pathinfo($entry, PATHINFO_FILENAME);
              if ($ext == 'jpg'||$ext == 'png'||$ext == 'jpeg') {
                echo '<div style="display:flex;">Image: <a href="./Videos/'.$entry.'">'.$without_extension.' </a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="Videos/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }elseif ($ext == 'mp4'||$ext == 'avi'||$ext == 'wmp') {
                echo '<div style="display:flex;">Video: <a href="./Videos/'.$entry.'">'.$without_extension.' </a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="Videos/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }else {
                echo '<div style="display:flex;">File: <a href="./Videos/'.$entry.'">'.$without_extension.' </a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="Videos/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }

            }
        }
        closedir($handle);
        }
       ?>
    </div>
    <div class="Dir content">
      <h2>Documents Directory (download):</h2>
      <?php
        if ($handle = opendir('./documents')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
              $ext = pathinfo($entry, PATHINFO_EXTENSION);
              $without_extension = pathinfo($entry, PATHINFO_FILENAME);
              if ($ext == 'jpg'||$ext == 'png'||$ext == 'jpeg') {
                echo '<div style="display:flex;">Image: <a href="./Documents/'.$entry.'">'.$without_extension.' </a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="Documents/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }elseif ($ext == 'mp4'||$ext == 'avi'||$ext == 'wmp') {
                echo '<div style="display:flex;">Video: <a href="./Documents/'.$entry.'">'.$without_extension.' </a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="Documents/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }else {
                echo '<div style="display:flex;">File: <a href="./Documents/'.$entry.'">'.$without_extension.' </a><form action="../../index/unlink.php" method="post"><input type="hidden" name="dirfile" value="Documents/'.$entry.'"><button type="submit" name="delete-submit">Delete</button></form></div><br>';
              }

            }
        }
        closedir($handle);
        }
       ?>
    </div>
  </div>
</main>




</body>
</html>
