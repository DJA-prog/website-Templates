// var random = Math.floor(Math.random() * 10) + 1;
//
// function Fours(value){
//   var output = value;
//   if (value < 1000) {
//     output = '0' + output;
//   }
//   if (value < 100) {
//     output = '0' + output;
//   }
//   if (value < 10) {
//     output = '0' + output;
//   }
//   return output;
// }
// var background_img = "../img/backgrounds/"+Fours(random)+".webp";

function openMobileNav() {
  document.getElementById("left_menu_mobile").style.width = "85%";
}

function openNav() {
  document.getElementById("left_menu_mobile").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("left_menu_mobile").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

function display(table_name, item_id, name, rate){
  if (table_name == "Animations" || table_name == "Videos") {
    openDisplay('videos', name, rate);
  }
}

function openDisplay(ID, name, rate){
  document.getElementById(ID).style.display = "inline";
  document.getElementById(ID).getElementsByClassName('display_title')[0].innerHTML = name;
  document.getElementById(ID).getElementsByClassName('display_rate')[0].innerHTML = rate;
}

function closeDisplay(ID){
  document.getElementById(ID).style.display = "none";
}
