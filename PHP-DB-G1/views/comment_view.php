<?php require_once('../templates/header.php');
require_once('../models/database.php');
$id=null;
isset($_GET['post_id'])?$id=$_GET['post_id']: null;
$post= getItemById($id);
 ?>

<form action="../controllers/comment_controller.php" method="POST">
    <input type="hidden" value="<?php echo $id;?>" name="postId">

    <div class="comment-post">
        <h1 class="header-comment">Facebook comment box</h1>
        <hr>
        <div class="circle-profile-name">
            <img src="../images/profile.png" class="logo-profile">
            <h3>MayZa</h3>
        </div>
        <div class="comment-tage">
            <div class="area">
                <textarea class="textarea" name="comments" placeholder="Write a comment ....."></textarea>
            </div>
            <button type="submit" name="comment" id="$id" class="comment">Comments</button>
        </div>
    </div>
</form> 