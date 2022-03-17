<?php
/**
 * Your code here
 */
require_once('database.php');

function createPost($descriptoin,$user_id){
    global $db;
    $statement = $db->prepare('INSERT INTO posts (descriptoin,user_id) values(:descriptoin,:user_id)');
    $statement->execute([
        ':descriptoin' => $descriptoin,
        ':user_id' => $user_id,
    ]);
    return $statement->rowcount()>0;
}
function getPost(){
    global $db;
    $statement = $db ->prepare("SELECT *FROM posts order by post_id desc");
    $statement ->execute();
    return $statement->fetchAll();
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