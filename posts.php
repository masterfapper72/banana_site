<?php require_once "includes/functions.inc.php"; ?>
<?php require_once "includes/db_connect.inc.php"; ?>
<?php include_once "modules/header.php"; ?>

<button type="button" class="new-post-btn" onclick="openNewPostPop()">New +</button>
<div id="ed_pop" class="bio-sett-pop-bg" onclick="closeNewPostPop()"></div>
<div id="new_post_pop" class="create-post-popup">
    <h2 class="create-post-title">CREATE NEW POST</h2>
    <hr class="sep-1">
    <form class="new-post-form" action="includes/handle_new_post.inc.php" method="POST" enctype="multipart/form-data">
        <input class="new-post-title" type="text" name="new_post_title" placeholder="POST TITLE...">
        <br>
        <br>
        <textarea class="new-post-txt" name="new_post_content"></textarea> 
        <button type="submit" name="submit" class="new-post-pub-btn">Publish</button>
    </form>
</div>
<div id="ed_pop_3" class="bio-sett-pop-bg" onclick="closeDeletePostPop()"></div>
<div id="delete_post" class="delete-post-popup">
    <div class="delete-post-content">
        <h3>Are you sure you want to delete this post?</h3>
        <br>
        <form action="includes/delete_post.inc.php" method="POST">
            <button id="yes_btn" class="delete-post-btn" type="submit" name="yes_del_btn" onclick="document.getElementById('yes_btn').value = globalThis.postId">Yes</button>
            <button class="delete-post-btn">No</button>
        </form>
    </div>
</div>
<div class="user-posts">
    <table>
        <?php getPostContent($conn); ?>
    </table>
</div>

<?php mysqli_close($conn); ?>
<?php include_once "modules/footer.php"; ?>