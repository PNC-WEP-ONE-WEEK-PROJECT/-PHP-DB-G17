<?php
require_once ('../templates/header.php');
require_once ('../models/post.php');
?>
<!-- ---------------------navbar------------ -->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-primary"> <h3>Facebook</h3></span>
    <a href="../index.php"><i class="fa fa fa-home" style="font-size:40px;border-bottom: 3px solid blue;"></i></a>
  </div>
</nav>
<!-- -----------------------------form for add comment  -->
<div class="container">
  <?php
  isset($_GET['id']) ? $id=$_GET['id'] : $id=null;
  if($id!=null){
      $post = get_post_by_id($id);
  }
  ?>
  <div class="col-8 m-auto p-3">
    <h4  class="col-6 m-auto p-3">+Add Comment Here..</h4>
    <form action="../controllers/display_comment.php" method="post">
      <input type="hidden" value="<?php echo $post['post_id']?>" name="id">
      <div class="form-group">
        <input type="text" class="form-control " placeholder="comment" name="comment" value="">
      </div>
      <button class="submit form-control bg-primary">Send</button>
    </form>
</div>
<?php require_once('../templates/footer.php') ?>

