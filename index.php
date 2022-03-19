<?php 
require_once ('templates/header.php');
require_once ('models/post.php');
?>
<!-- navbar -->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Facebook</span>
    <a href="#"><i class="fa fa fa-home" style="font-size:40px"></i></a>
  </div>
</nav>

<!-- container -->

<div class="container">

<!-- post filture in right  -->
    <div class="rigth-bar">
        <div class="mx-auto w-75">
        <?php
            $posts = get_post();
            foreach($posts as $post):
        ?>
                <!-- create profilt acc  when post -->
            <div class="card mt-5">
                <div class="card-header  w-25 h-75">                                       
                    <img src="images/rady.jpg" class="rounded-circle w-50 h-75" alt="">                   
                </div>
                <!-- create descriptoin and img for post -->
                <div class="card-body">
                    <div class="p-2 ml-3"><?php echo $post['descriptoin'] ?></div> 
                    <div class="img-post w-100 "><img class="w-100" src="image_upload/<?= $post['imges']?>" alt=""></div>
                    <button class="like"><a class="fa fa fa-thumbs-up"  >like ❤ 23k</a> </button>
                    <button class="like"><a href="views/display_comment_view.php?id=<?php echo $post['post_id'] ?>" >comment</a> </button>
                </div>
                <div class="mb-3">
                    <span>hello!</span>
                </div>
            </div>
                <?php endforeach ?>
            
        </div>
    </div>

    <!-- put img cover and profile -->
    <div class="left-bar ">
        <div>
            <img class="img-cover" src="images/cute.jpg" alt="">
        </div>
        <div class="img-profile">
            <img class="rounded-circle" src="images/sweet.jpg" alt="" >
        </div>
        <div class="card-text">
            <h3>MEY SOK</h3>
        </div>
        <div class="btn_post mt-3">
            <button><a href="views/post_view.php">What's on your mine</a></button>
        </div>
    </div>
</div>





<?php require_once ('templates/footer.php');?>