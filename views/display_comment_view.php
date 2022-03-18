<?php
require_once ('../templates/header.php');
require_once ('../models/post.php');
?>
<div class="container">
<?php
isset($_GET['id']) ? $id=$_GET['id'] : $id=null;
if($id!=null){
    $post = get_post_by_id($id);

}
   
?>
<form action="../controllers/display_comment.php" method="post">
        <input type="hidden" value="<?php echo $post['post_id']?>" name="id">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="comment" name="comment" value="">
        </div>
            <button class="submit form-control bg-primary">Send</button>
        </div>
</form>
</div>

<?php require_once('../templates/footer.php') ?>

