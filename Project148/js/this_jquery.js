$(document).ready(function(){
  $(".favourites_box .favourites_play").click(function(){
    var my_table = $(this).parent().find(".favourites_selection").attr('tp_table');
    var my_id = $(this).parent().find(".favourites_selection").attr('tp_table_id');
    var my_user_id = $(this).parent().find(".favourites_selection").attr('tp_user_id');
    $("#videos").load("./ajax/videos_display.php", {table: my_table, id: my_id, user_id: my_user_id});
    $("#videos").show();
  });

  $(".favourites_box .favourites_favourite").click(function(){
    var my_table = $(this).parent().find(".favourites_selection").attr('tp_table');
    var my_id = $(this).parent().find(".favourites_selection").attr('tp_table_id');
    var my_user_id = $(this).parent().find(".favourites_selection").attr('tp_user_id');
    $(this).load("./ajax/fav.php", {table: my_table, id: my_id, user_id: my_user_id});
  });

  $(".website_box .website_button_edit").click(function() {
    $(this).parent().parent().find(".website_print").hide();
    $(this).parent().parent().find(".website_input").show();
    $(this).parent().find(".website_button_edit").hide();
    $(this).parent().find(".website_button_apply").show();
  });

  $(".website_box .website_button_apply").click(function() {
    $(this).parent().parent().find(".website_print").show();
    $(this).parent().parent().find(".website_input").hide();
    $(this).parent().find(".website_button_edit").show();
    $(this).parent().find(".website_button_apply").hide();
    var fieldName = $(this).parent().parent().find(".website_title").text();
    var value = $(this).parent().parent().find(".website_value_input").val();
    $(this).parent().parent().find(".website_value").text(value);
    var iconPath = $(this).parent().parent().find(".website_icon_path_input").val();
    $(this).parent().parent().find(".website_icon_path").text(iconPath);
    $.post("./ajax/update_websiteData.php", {fieldName: fieldName, value: value, iconPath: iconPath});
  });


});

// $(".favourites_box", this)
