<?php 
require_once('../models/database.php');

if(isset($_POST['upload'])){
    // the path to store the uploaded image
    $target="../images/".basename($_FILES['image']['name']);
    // get all the sumbitted data from form
    $image=$_FILES['image']['name'];
    $content=$_POST['content'];
    $id=$_POST['postId'];
    updatePost($id,$content,$image);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
        // echo  '<img src="../images/'.$image. '" alt="">';
        $msg="Succesfull";
    }
    header("location:../views/post_view.php");
};
?>