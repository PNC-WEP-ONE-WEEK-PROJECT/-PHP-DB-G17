<?php require_once '../models/post.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['itemId'];
    $descriptoin = $_POST['descriptoin'];
    $imges = $_POST['old_image'];
    if (!empty($_FILES["uploadfile"]["name"])){
        $image = $_FILES["uploadfile"]["name"];
    }
	$tempname = $_FILES["uploadfile"]["tmp_name"];
    $target="../image_upload/".$imges;
    move_uploaded_file($tempname,$target);
    if(!empty($descriptoin) or !empty($imges)){
        $up_date_posts = udate_post($descriptoin,$imges,1);
        header('location:../views/post_view.php');
    }
}