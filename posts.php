<?php require_once "includes/functions.inc.php"; ?>
<?php require_once "includes/db_connect.inc.php"; ?>
<?php include_once "modules/header.php"; ?>

<button type="button" class="new-post-btn" onclick="openNewPostPop()">New +</button>
<div id="ed_pop" class="bio-sett-pop-bg" onclick="closeNewPostPop()"></div>
<div id="new_post_pop" class="create-post-popup">
    <h2 class="create-post-title">CREATE NEW POST</h2>
    <hr class="sep-1">
    <form class="new-post-form" action="includes/handle_new_post.inc.php" method="POST" enctype="multipart/form-data">
        <textarea class="new-post-txt"></textarea>
        <button type="submit" name="submit" class="new-post-pub-btn">Publish</button>
    </form>
</div>

<?php mysqli_close($conn); ?>
<?php include_once "modules/footer.php"; ?>