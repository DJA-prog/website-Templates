<div class="website">
  <table>
    <tr>
      <th>FieldName</th>
      <th>Value</th>
      <th>Icon Path</th>
    </tr>
    <?php
    $query = "SELECT * FROM websiteData";
    $result = mysqli_query($conn,$query);
    if (!empty($result)){
      if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          echo '
          <tr class="website_box">
            <td><h3 class="website_title">'.$row['fieldName'].'</h3></td>
            <td><h4 class="website_value website_print">'.$row['value'].'</h4><input type="text" class="website_value_input website_input" value="'.$row['value'].'" placeholder="value"></td>
            <td><h4 class="website_icon_path website_print">'.$row['iconPath'].'</h4><input type="text" class="website_icon_path_input website_input" value="'.$row['iconPath'].'" placeholder="iconPath"></td>
            <td><button class="website_button website_button_edit">EDIT</button><button class="website_button website_button_apply">APPLY</button></td>
          </tr>
          ';
        }
      }
    }
     ?>
  </table>

</div>
