<?php
require_once '../models/post.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $descriptoin = $_POST['descriptoin'];
    if(!empty($descriptoin)){
        $isCreated = create_post($descriptoin,1);
        if($isCreated){
            header('location:../views/post_view.php');
        }else{
            header('location:../views/create_view.php');
        }
    }
}
?>