

<?php
require_once("../templates/header.php");
require_once('../models/database.php');

?>
<!-- menu -->
<div class="container">
    <form action="#" method="post">
        <div class="navigation">
            <h2>Facebook</h2>
            <div class="icons">
                <ul>
                    <li><a href="../views/post_view.php"><i class="fa fa-home fa-2x"></i></a></li>
                    <li><i class="fa fa-user-plus fa-2x"></i></li>
                    <li><i class="fa fa-user-circle fa-2x"></i></li>
                </ul>
            </div>
            <button>Sign In</button>
        </div>
        <div class="add-post">
            <div class="cirles-profile">
                <div class="profile">
                    <img src="../images/profile.png" alt="">
                </div>
                <p>MayZa</p>
            </div>
            <div class="buttons">
                <button class="btn"><a href="../views/create_view.php">Add Post</a></button>
            </div>
        </div>
    </form>



    <!-- display post -->
    <?php
    $posts=getItems();
    foreach($posts as $post){
     ?>
    <form action="../controllers/post_controller.php">
        <div class="add-post show-post ">
            <div class="delete">
                <div class="cirles-profile">
                    <div class="profile">
                        <img src="../images/profile.png" >
                    </div>
                    <p>MayZa</p>
                </div>
                <div class="delete_edit">
                    <div class="circle-icon">

                        <a href="../views/edit_view.php?post_id=<?php echo $post['post_id'];?>"><i class="fa fa-pencil-square-o"></i></a>
                    </div>
                    <div class="circle-icon red">

                        <a href="../controllers/delete_post.php?post_id=<?php echo $post['post_id'];?>"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
            <!-- <div class="date">
                    <p></?php $dateTime = $post['date_post'] ;
                     $newDate = new DateTime($dateTime);
                     echo $newDate->format("l jS \of F Y h:i:s A");                  
                    ?></p>
                </div> -->
            <div class="content-post">
                <p><?php echo $post['content_post'] ?></p>
            </div>
            <?php  if($post['image_name']!==""){ ?>
                <div class="photo-post">
                    <img src="../images/<?php echo $post['image_name']; ?>" alt="" >
                </div>
             <?php }; ?>

             <?php  
                $increment = 0;
                foreach ( post_like() as $likeimg):
                    if($likeimg['post_id'] == $post['post_id']){
                        $increment++;
                    }
                endforeach; ?>
                <?php 
                    $count_comm=0;
                    foreach(getContentCm($post['post_id']) as $comm){
                        if($comm['post_id']==$post['post_id']){
                            $count_comm++;
                        }
                    }
                ?>
                <div class="countLC">
                    <div class="count-like">
                        <p><?php echo $increment ?> Likes</p>
                    </div>
                    <div class="comment-box">
                        <p><?php echo $count_comm ?> Comments </p>
                    </div>
                </div>
                
                
            <div class="like-comment">
                <div class="like">
                    <button type="submit" <?= $post["post_id"]; ?> name="like-post"><a href="../controllers/like_controller.php?post_id= <?php echo $post['post_id'] ?>" class="fa fa-thumbs-o-up">Like</a></button>
                </div>
                <div class="comment">
                    <a href="../views/comment_view.php?post_id=<?php echo $post['post_id'];?>"><i class="fa fa-comment-o"></i>Comment</a>
                </div>
            </div>
            <?php  
            $postID=$post['post_id'];
            $commentpost=  getContentCm($postID);
                foreach ($commentpost as $comment){
            ?>
            
            <div class="display-comment">
                <div class="cirles-profile photo">
                    <div class="profile name">
                        <img src="../images/profile.png" >
                    </div>
                    <p>MayZa</p>
                    <div class="icon-circle red">
                        <a href="../controllers/delete_comment.php?comment_id=<?php echo $comment['comment_id'];?>"><i class="fa fa-trash"></i></a>
                    </div>   
                </div>
                <div class="text">
                    <p><?php echo $comment['content'] ?> </p>
                </div>
            </div>
            <?php }; ?>
            
        </div>
    </form>
    <?php }; ?>
</div>
<?php
require_once("../templates/footer.php")
?>