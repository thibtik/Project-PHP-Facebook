<?php 
require_once('../templates/header.php');
require_once('../models/database.php');
?>
<div class="post_container">
    <?php 
        $id=null;
        isset($_GET['post_id'])?$id=$_GET['post_id']: null;
        $post= getItemById($id);
     ?>
    <form action="../controllers/edite_controller.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id;?>" name="postId">
       <div class=" post">
           <a href="post_view.php"><i class="fa fa-arrow-left">Create Post</i></a>
           <button type=" submit" name="upload"  value="Upload Image">Update</button>
       </div>
       <div class="profile-name">
           <div class="circle-profile-name">
               <img src="../images/profile.png" class="logo-profile">
               <h3>MayZa</h3>
           </div>
           <div class="content">
                <input type="text" name="content"  class="input" value="<?php echo $post['content_post'] ?>">    
           </div>
       </div>
       <div class="upload-img">
           <label for="post_id"><i class="fa fa-image fa-2x"></i></label>
            <input type="file" name="image" id="post_id" style="display: none;" >
       </div>
    </form>
</div>
<?php 
require_once('../templates/footer.php')
?>

