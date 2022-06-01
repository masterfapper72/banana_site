var lbg =  document.getElementById("login-bg");
var lpopup = document.getElementById("login-popup");
var sbg =  document.getElementById("signup-bg");
var spopup = document.getElementById("signup-popup");

function openLogin() {
    lbg.style.display = "block";
    lpopup.style.display = "block";
}

function closeLogin() {
    lbg.style.display = "none";
    lpopup.style.display = "none";
}

function openSignup() {
    sbg.style.display = "block";
    spopup.style.display = "block";
}

function closeSignup() {
    sbg.style.display = "none";
    spopup.style.display = "none";
}