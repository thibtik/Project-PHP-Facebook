
<?php
require_once('../models/database.php');

$postid=$_GET['post_id'];
Addlikes($postid);

header("location:../views/post_view.php");
?>