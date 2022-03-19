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

// -----function comment-----
function create_comment($content,$user_id,$post_id){
    global $db;
    $statement = $db->prepare('INSERT INTO comments (content,user_id,post_id) values(:content,:user_id,:post_id)');
    $statement->execute([
        ':content' => $content,
        ':user_id' => $user_id,
        ':post_id' => $post_id
    ]);
    return $statement->rowcount()>0;
}


function get_comment_post($post_id){
    global $db;
    $statement=$db->prepare("SELECT * FROM comments WHERE post_id=:post_id");
    $statement->execute([
        ':post_id' => $post_id
    ]);
    return $statement->fetchAll();

    
}

function insert_like($user_id,$post_id,$num_like){
    global $db;
    $statement = $db->prepare('INSERT INTO likes (user_id,post_id,num_like) values(:user_id,:post_id,:num_like)');
    $statement->execute([
        ':user_id' => $user_id,
        ':post_id' => $post_id,
        ':num_like'=> $num_like
    ]);
    return $statement->rowcount()>0;
}

function get_like($post_id){
    global $db;
    $statement=$db->prepare("SELECT count(num_like) AS 'num_of_like' FROM likes WHERE post_id=:post_id");
    $statement->execute([
        ':post_id' => $post_id
    ]);
    return $statement->fetchAll();
}