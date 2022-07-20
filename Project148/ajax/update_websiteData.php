<?php
$fieldName = $_POST['fieldName'];
$value = $_POST['value'];
$iconPath = $_POST['iconPath'];

require '../includes/dbh.inc.php';

$query = "UPDATE websiteData SET websiteData.value=?,websiteData.iconPath=? WHERE websiteData.fieldName=?;";
$stmt = $conn->prepare($query);
$stmt->bind_param('sss', $value, $iconPath, $fieldName);
$stmt->execute();

echo '
<td><h3 class="website_title">'.$fieldName.'</h3></td>
<td><h4 class="website_value website_print">'.$value.'</h4><input type="text" class="website_value_input website_input" value="'.$value.'" placeholder="value"></td>
<td><h4 class="website_icon_path website_print">'.$iconPath.'</h4><input type="text" class="website_icon_path_input website_input" value="'.$iconPath.'" placeholder="iconPath"></td>
<td><button class="website_button website_button_edit">EDIT</button><button class="website_button website_button_apply">APPLY</button></td>
';

 ?>
