var lbg =  document.getElementById("login-bg");
var lpopup = document.getElementById("login-popup");
var sbg =  document.getElementById("signup-bg");
var spopup = document.getElementById("signup-popup");
var settpopup = document.getElementById("p_settings");
var editPop = document.getElementById("ed_pop");
var editPop2 = document.getElementById("ed_pop_2");
var editPop3 = document.getElementById("ed_pop_3");
var editPop4 = document.getElementById("ed_pop_4");
var newPostPop = document.getElementById("new_post_pop");
var deletePost = document.getElementById("delete_post");
var editPost = document.getElementById("edit_post");

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

function editPopup() {
    editPop.style.display = "block";
    editPop2.style.display = "block";
}

function closeEditPopup() {
    editPop.style.display = "none";
    editPop2.style.display = "none";
}

function openNewPostPop() {
    editPop.style.display = "block";
    newPostPop.style.display = "block";
}

function closeNewPostPop() {
    editPop.style.display = "none";
    newPostPop.style.display = "none";
}

function openDeletePostPop(id) {
    editPop3.style.display = "block";
    deletePost.style.display = "block";
}

function closeDeletePostPop() {
    editPop3.style.display = "none";
    deletePost.style.display = "none";
}

function openEditPostPop() {
    editPop4.style.display = "block";
    editPost.style.display = "block";
}

function closeEditPostPop() {
    editPop4.style.display = "none";
    editPost.style.display = "none";
}