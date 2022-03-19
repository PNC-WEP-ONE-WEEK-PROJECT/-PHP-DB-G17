<?php
// require file
require_once ('../templates/header.php');
require_once ('../models/post.php');

?>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Facebook</span>
    <a href="../index.php"><i class="fa fa fa-home" style="font-size:40px"></i></a>
  </div>
</nav>
<div class="container">
   
        <form action="../controllers/create_post.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="descriptoin" name="descriptoin">
                <!-- input file image  -->
                <label for="uploadfile"><i class='fas fa-image' style='font-size:36px;color:green'></i></label>
                <input type="file" name="uploadfile" value="" class="form-control" style='display:none' id="uploadfile">
            </div>
            <div class="form-group"> 
                <button type="submit"  class="submit form-control bg-primary">Post</button>
            </div>
        </form>

<!-- post filture in right  -->
    <div class="card w-50">
    <?php
        $posts = get_post();
        foreach($posts as $post):
    ?>
<!-- create profilt acc  when post -->
        <div class="card mt-5 ">
            <div class="card-header d-flex ">                                       
                    <img src="../images/rady.jpg" class="rounded-circle w-25  h-25" alt="">
                    <div>
                        <h5 class="d-inline">Mey Sok</h5>
                        <p class="">2021-10-02</p>                
                    </div>   
            </div>
            
<!-- create descriptoin and img for post -->
            <div class="card-body">
                <div class="p-2 ml-3"><?php echo $post['descriptoin'] ?></div> 
                <div class="img-post"><img src="../image_upload/<?= $post['imges']?>" alt="" class="w-100"></div>
                <div class="icon">
                    <!-- edit -->
                    <a href="edit_view.php?id=<?php echo $post['post_id']?>"><i class="fa fa-pen"></i></a>
                    <!-- delete -->
                    <a href="../controllers/delete_post.php?id=<?php echo $post['post_id'] ?>" ><i class="fa fa-trash"></i></a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>        
</div>
<?php require_once ('../templates/footer.php');?>