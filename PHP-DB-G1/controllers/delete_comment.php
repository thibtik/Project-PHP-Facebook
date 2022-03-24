<?php  require_once('../models/database.php');
$id=$_GET['comment_id'];
deleteComment($id);
header("location:../views/post_view.php");  
?>