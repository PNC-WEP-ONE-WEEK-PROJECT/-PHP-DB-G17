<?php
/**
 * Your code here
 */
require_once('database.php');

function create_post($descriptoin,$user_id){
    global $db;
    $statement = $db->prepare('INSERT INTO posts (descriptoin,user_id) values(:descriptoin,:user_id)');
    $statement->execute([
        ':descriptoin' => $descriptoin,
        ':user_id' => $user_id,
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
    $statement = $db->prepare('DELETE FROM posts WHERE post_id = :id');
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->rowCount() > 0;
   
}
function get_post_by_id($id){
    global $db;
    $statement =$db->prepare("SELECT * FROM posts WHERE post_id = :post_id");
    $statement->execute([
        ':post_id'=>$id,
    ]);
    return $statement->fetch();
}

function udate_post($post_id,$descriptoin,$user_id){
    global $db;
    $statement=$db ->prepare("UPDATE POSTS SET descriptoin=:descriptoin,user_id where post_id = :post_id");
    $statement->execute([
        ':descriptoin'=>$descriptoin,
        ':user_id' => $user_id,
        ':post_id' => $post_id
    ]);
    return $statement->rowcount()>0;
}

// -----function comment-----
function create_comment($description,$user_id,$post_id){
    global $db;
    $statement = $db->prepare('INSERT INTO comments (description,user_id,post_id) values(:description,:user_id,:post_id)');
    $statement->execute([
        ':description' => $description,
        ':user_id' => $user_id,
        ':post_id' => $post_id
    ]);
    return $statement->rowcount()>0;
}


function get_comment_post(){
    global $db;
    $statement=$db->prepare("SELECT * FROM comments ORDER BY comment_id desc");
    $statement->execute();
    return $statement->fetch();
}