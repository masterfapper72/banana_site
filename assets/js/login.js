var lbg =  document.getElementById("login-bg");
var lpopup = document.getElementById("login-popup");
var sbg =  document.getElementById("signup-bg");
var spopup = document.getElementById("signup-popup");
var settpopup = document.getElementById("p_settings");

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

function openProfileSettings() {
    settpopup.style.display = "block";
}

function closeProfileSettings() {
    settpopup.style.display = "none";
}