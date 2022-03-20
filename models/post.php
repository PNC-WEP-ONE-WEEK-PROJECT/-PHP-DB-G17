<?php
/**
 * Your code here
 */
require_once('database.php');

function create_post($descriptoin,$image,$user_id)
{
    global $db;
    $statement = $db->prepare('INSERT INTO posts (descriptoin,imges,user_id) values(:descriptoin,:images,:user_id)');
    $statement->execute([
        ':descriptoin' => $descriptoin,
        ':images' => $image,
        ':user_id' => $user_id
    ]);
    return $statement->rowcount()>0;
}



function get_post()
{   
    
    global $db;
    $statement = $db->prepare('SELECT * FROM posts ORDER BY post_id desc');
    $statement->execute();
    return $statement->fetchAll();
}

function delete_post($id)
{
    global $db;
    $statement = $db->prepare('DELETE FROM posts WHERE post_id = :post_id');
    $statement->execute([
        ':post_id' => $id
    ]);
    return $statement->rowCount() > 0;
   
}
function get_post_by_id($id){
    global $db;
    $statement =$db->prepare("SELECT * FROM posts WHERE post_id = :post_id ORDER BY post_id");
    $statement->execute([
        ':post_id'=>$id,
    ]);
    return $statement->fetch();
}

function udate_post($descriptoin,$images,$post_id){
    global $db;
    $statement=$db ->prepare("UPDATE posts SET descriptoin=:descriptoin,imges=:imges where post_id = :post_id");
    $statement->execute([
        ':descriptoin'=>$descriptoin,
        ':imges'=>$images,
        ':post_id' => $post_id
    ]);
    return $statement->rowcount()>0;
}



