<?php
require_once '../models/post.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{   
    $post_id =$_POST['id'];
    echo $post_id;
   $description = $_POST['comment'];
   if(!empty($description) and !empty($post_id) ){
       $is_created = create_comment($description,1,$post_id);
       if($is_created){
    }
    header('location:../index.php');
   }
}
?>