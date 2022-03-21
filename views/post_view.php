<?php
// require file
require_once ('../templates/header.php');
require_once ('../models/post.php');

?>
<!-- ----------------------navbar-------------- -->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Facebook</span>
    <i class="fa fa fa-user " style="font-size:40px"></i>
    <a href="../index.php"><i class="fa fa fa-home" style="font-size:40px"></i></a>
  </div>
</nav>

<!-------------------button add post--------------- -->

<div class="container mt-5  ">
    <button type="button" class="btn btn-primary bg-primary col-6  m-auto " data-bs-toggle="modal" data-bs-target="#staticBackdrop">+Add Post</button>

<!-- -------------------Modal---------------------- -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Post</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">close</a>
                </div>
                <div class="modal-body">
                    <form action="../controllers/create_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            input type="text" class="form-control" placeholder="descriptoin" name="descriptoin">
                            <!-- input file image  -->
                            <label for="uploadfile"><i class='fas fa-image' style='font-size:36px;color:green'></i></label>
                            <input type="file" name="uploadfile" value="" class="form-control" style='display:none' id="uploadfile">
                        </div>
                        <div class="form-group"> 
                            <button type="submit"  class="submit form-control bg-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- -----------------------card post------------------- -->
    <div class=" w-50 col-12">
        <?php
            $posts = get_post();
            foreach($posts as $post):
        ?>
<!-- -------------------------create profilt acc  when post------------- -->
        <div class="card m-5 ">
            <div class="card-header bg-white d-flex justify-content-between">                                       
                <div class=" w-25 h-75 ">
                    <img src="../images/rady.jpg" class="rounded-circle w-50 h-75 " alt="">  
                    <H5>MEY SOK</H5>
                    <p><?php echo $post['postDate']?></p>
                </div>
                <div class="dropdown ">
                    <button class=" btn btn-none text-dark  " type="button" data-toggle="dropdown"><h1>...</h1></button>
                    <div class="dropdown-menu ">
                        <!-- edit -->
                        <a href="edit_view.php?id=<?php echo $post['post_id']?>"><i class="fa fa-pen"></i></a>
                        <!-- delete -->
                        <a href="../controllers/delete_post.php?id=<?php echo $post['post_id'] ?>" ><i class="fa fa-trash"></i></a>
                    </div>
                </div>   
            </div>
<!-----------------------------create descriptoin and img for post ----------------->
            <div class="card-body">
                <div class="p-2 ml-3"><?php echo $post['descriptoin'] ?></div> 
                <div class="img-post"><img src="../image_upload/<?= $post['imges']?>" alt="" class="w-100"></div>
            </div>
        </div>
        <?php endforeach ?>
    </div>        
</div>
<?php require_once ('../templates/footer.php');?>