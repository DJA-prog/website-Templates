/* Set the width of the side navigation to 250px */
function login_register() {
  document.getElementById("login_register").style.display = "block";
}
function login_register_close() {
  document.getElementById("login_register").style.display = "none";
}
function logout() {
  document.getElementById("logout").style.display = "block";
}
function logout_close() {
  document.getElementById("logout").style.display = "none";
}
function delete_profile() {
  if (document.getElementById("delete_profile").style.display == "block") {
    document.getElementById("delete_profile").style.display = "none";
  }else {
    document.getElementById("delete_profile").style.display = "block";
  }
}
function update_bio() {
  if (document.getElementById("update_profile_bio").style.display == "block") {
    document.getElementById("update_profile_bio").style.display = "none";
    document.getElementById("profile_bio_sqlireturn").style.display = "block";
  }else {
    document.getElementById("update_profile_bio").style.display = "block";
    document.getElementById("profile_bio_sqlireturn").style.display = "none";
  }
}
function goBack() {
  window.history.back();
}

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    if (document.getElementById("myDropdown").classList.contains('show')) {
      document.getElementById("myDropdown").classList.remove('show');
    }
  }
}

//profiles[] = {"personal", "pwd_change", "personalise", "delete_profile"};
let profiles = ["personal", "pwd_change", "personalise", "delete_profile"];

function profile(button){

    var len = profiles.length;
    var i = 0;
    while (i < len) {
        if (profiles[i] == button) {
            break;
        }
        else {
            i++;
        }

    }

    for (var j = 0; j < profiles.length; j++) {
      if (j == i) {
        document.getElementById(profiles[j]).style.display = "block";
      }else {
        document.getElementById(profiles[j]).style.display = "none";
      }
    }

}

/*
function personal() {
  document.getElementById("change_profile_img").style.display = "flex";
  document.getElementById("BIO").style.display = "block";
  document.getElementById("personalise").style.display = "none";
  document.getElementById("pwd_change").style.display = "none";
  document.getElementById("delete_profile").style.display = "none";
}

function password(){
  document.getElementById("pwd_change").style.display = "block";
  document.getElementById("change_profile_img").style.display = "none";
  document.getElementById("personalise").style.display = "none";
  document.getElementById("BIO").style.display = "none";
  document.getElementById("delete_profile").style.display = "none";
}

function personalise(){
  document.getElementById("personalise").style.display = "block";
  document.getElementById("change_profile_img").style.display = "none";
  document.getElementById("BIO").style.display = "none";
  document.getElementById("pwd_change").style.display = "none";

}

function terminate(){
  document.getElementById("delete_profile").style.display = "block";
  document.getElementById("change_profile_img").style.display = "none";
  document.getElementById("BIO").style.display = "none";
  document.getElementById("personalise").style.display = "none";
  document.getElementById("pwd_change").style.display = "none";
}
*/
