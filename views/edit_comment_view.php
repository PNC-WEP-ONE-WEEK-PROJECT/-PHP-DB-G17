<?php
require_once('../templates/header.php');
require_once('../templates/nav.php');
require_once('../models/comment.php');
?>
<div class="container">
<?php
isset($_GET['id']) ? $id=$_GET['id'] : $id=null;
if($id!=null){
    $comment = get_comment_by_id($id);

}
   
?>
<form action="../controllers/edit_comment_controllers.php" method="post">
        <input type="hidden" value="<?php echo $comment['comment_id']?>" name="id">
        <div class="form-group">
            <input type="text" class="form-control " placeholder="comment" name="comment" value="<?php echo $comment['content']?>">
        </div>
            <button class="submit form-control bg-primary">Send</button>
        </div>

</form>
</div>
<?php require_once ('../templates/footer.php'); ?>