
<?php require_once('../templates/header.php')?>
<div class="post_container">
    <form action="../controllers/post_controller.php" method="post" enctype="multipart/form-data">
       <div class=" post">
           <a href="post_view.php"><i class="fa fa-arrow-left">Create Post</i></a>
           <button type=" submit" name="upload"  value="Upload Image">POST</button>
       </div>
       <div class="profile-name">
           <div class="circle-profile-name">
               <img src="../images/profile.png" class="logo-profile">
               <h3>MayZa</h3>
           </div>
           <div class="contents">
               <textarea class="inputarea" name="content" placeholder="Say something about this photo"></textarea>
           </div>
       </div>
       <div class="upload-img">
            <label for="post_id"><i class="fa fa-image fa-2x">Choose photoes</i></label>
            <input type="file" name="image" id="post_id" style="display: none;"></p>
       </div>
    </form>
</div>
<?php require_once('../templates/footer.php')?>