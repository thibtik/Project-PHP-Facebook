

<?php 
require_once('../models/database.php');
$text_comment=$_POST['comments'];

$post_id=$_POST['postId'];

AddComments($text_comment,$post_id);

header("location:../views/post_view.php");
?>