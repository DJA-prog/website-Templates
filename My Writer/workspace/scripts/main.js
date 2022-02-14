function logout() {
  document.getElementById("logout").style.display = "block";
}
function logout_close() {
  document.getElementById("logout").style.display = "none";
}
function goBack() {
  window.history.back();
}

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function new_script() {
  document.getElementById("new_script_form").style.display = "block";
  document.getElementById("Cell").style.display = "none";
  document.getElementById("pwd_change").style.display = "none";
  document.getElementById("delete_profile").style.display = "none";
}

function close_new_script_form() {
  document.getElementById("new_script_form").style.display = "none";
}

function continue_script() {
  document.getElementById("new_script_form").style.display = "none";
  document.getElementById("Cell").style.display = "none";
  document.getElementById("pwd_change").style.display = "none";
  document.getElementById("delete_profile").style.display = "none";
}

function my_library() {
  document.getElementById("new_script_form").style.display = "none";
  document.getElementById("Cell").style.display = "none";
  document.getElementById("pwd_change").style.display = "none";
  document.getElementById("delete_profile").style.display = "none";
}
