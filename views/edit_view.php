<?php
require_once('../templates/header.php');
require_once('../models/post.php');
?>
<!---------------------------------navbar--------------- -->



<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Facebook</span>
    <a href="../index.php"><i class="fa fa fa-home" style="font-size:40px"></i></a>
  </div>
</nav>

<div class="container">
<?php
    $id = $_GET['id'];
    $post = get_post_by_id($id);
?>
<form action="../controllers/create_post.php" method="post">
        <input type="hidden" value="<?php echo $post['post_id'] ?>" name="itemId">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="descriptoin" name="descriptoin" value="<?php echo $post['descriptoin'] ?>">
        </div>
            <button class="submit form-control bg-primary">Post</button>
        </div>
</form>
</div>


<?php require_once ('../templates/footer.php');?>
