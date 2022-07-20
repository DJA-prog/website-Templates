<?php
function ListFiles($where){
  if ($handle = opendir($where)) {
    $return = array();
    while (false !== ($entry = readdir($handle))) {
     if ($entry != "." && $entry != "..") {
       // $ext = pathinfo($entry, PATHINFO_EXTENSION);
       // $without_extension = pathinfo($entry, PATHINFO_FILENAME);
       // $under_score_extension = str_replace(' ', '_', $without_extension);
       if(substr($where, -1) == '/'){
         array_push($return, $where.$entry);
       }else{
         array_push($return, $where.'/'.$entry);
       }
     }
    }
   closedir($handle);
   }
   return $return;
}

function zeros($val, $digits){ //prefix 0 to string
  $x = $digits - strlen($val);
  for ($i=0; $i < $x; $i++) {
    $val = '0'.$val;
  }
  return $val;
}

function nextFile($file){
  if (file_exists($file)) {
    $nextFile = 0;
    while (file_exists($file.'_'.zeros($nextFile, 4)) == "true") {
      $nextFile++;
    }
    $file = $file.'_'.zeros($nextFile, 4);
  }
  return $file;
}

function renameAll($path){
  $NotBeOne = array(".", "..", "cover.jpg");

  $path = $path."/";
  $arriles = scandir($path);
  sort($arriles, SORT_NATURAL | SORT_FLAG_CASE);
  array_splice($arriles, array_search(".", $arriles), 1);
  // array_splice($arriles, array_search("..", $arriles), 1);
  foreach ($arriles as $key => $value) {
    if(!in_array($value, $NotBeOne)){
      // echo '<h4 style="color:red;">'.$key.'--'.$value.'</h4>';
      $ext = pathinfo($value, PATHINFO_EXTENSION);
      // echo $path.$value.' => '.$path.zeros($key, 4).'.'.$ext;
      rename($path.$value, $path.zeros($key, 4).'.'.$ext);
      // if(zeros($key, 4) == "0001"){
      //   copy($path.zeros($key, 4).'.'.$ext, $path.'cover.'.$ext);
      // }
    }
  }
}

function coverCreate($path, $log){
  $path = $path."/";
  $arriles = scandir($path);
  sort($arriles, SORT_NATURAL | SORT_FLAG_CASE);
  array_splice($arriles, array_search(".", $arriles), 1);
  // array_splice($arriles, array_search("..", $arriles), 1);
  foreach ($arriles as $key => $value) {
    if(pathinfo($value, PATHINFO_FILENAME) == "0001"){
      $ext = pathinfo($value, PATHINFO_EXTENSION);
      if(!file_exists($path."cover.".$ext)){
        copy($path.$value, $path."cover.".$ext);
        echo '<span style="color:pink;">'.$path.$value.' +> '.$path.'cover.'.$ext.' [ COVER CREATED ]</span><br />';
        if($log == "true"){
          fwrite($log, "\t--".$path.$value.' +> '.$path.'cover.'.$ext."[ COVER CREATED ]\n");
        }
      }
    }

  }
}

function insertToList($string, $listPath){
  if(!file_exists($listPath)){
    return 1; //listfile does not exist
  }
  $listFile = fopen($listPath, "r") or die("Unable to open file!");
  $List = fread($listFile,filesize($listPath));
  $listArray = explode(',', $List);
  foreach ($listArray as $key => $value) {
    if($string == $value){
      return 2; //string already in list
    }
  }
  fclose($listFile);
  $listFile = fopen($listPath, "a") or die("Unable to open file!");
  fwrite($listFile, ','.$string);
  fclose($listFile);
  return 0;
}

function contentCount($file)
{
  if ($handle = opendir($file)) {
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        $ext = pathinfo($entry, PATHINFO_EXTENSION);
        if($ext == ""){FunctionName($file.$entry.'/');}else
        if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "wpeb"){GLOBAL $images; $images++;}else
        if($ext == "mp4" || $ext == "avi" || $ext == "gp3"){GLOBAL $videos; $videos++;}else
        if($ext == "docx" || $ext == "txt" || $ext == "doc" || $ext == "pdf"){GLOBAL $doc; $doc++;}else
        if($ext == "gif"){GLOBAL $gifs; $gifs++;}else {
          GLOBAL $other; $other++;
        }
        //echo $entry, '<br>';
      }
    }
  closedir($handle);
  }
}
 ?>
