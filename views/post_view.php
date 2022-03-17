<?php
require_once ('../templates/header.php');
require_once ('../models/post.php');

?>
<div class="container">
    <!-- Your code here -->
        <form action="../controllers/create_post.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="descriptoin" name="descriptoin">
        </div>
        <!-- <input type="file" name="uploadfile" value="" class="form-control"/>
        <div>
            <button type="submit" name="upload" class="form-control">UPLOAD</button>
        </div>
        <div class="form-group"> -->
            <button class="submit form-control bg-primary">Post</button>
        </div>
        </form>
        <div class="container">
    <?php
        $posts = getPost();
        foreach($posts as $post):
    ?>
        <div class="right-post">
                <div class="header">
                    <!-- <img class="img-cover" src="../images/rady.jpg" alt=""> -->
                    <p>2021-10-02</p>
                </div>
                <div class="description"><?php echo $post['descriptoin'] ?></div> 
                <!-- <div class="img-post"><img src="../images/girls.jpg" alt=""></div> -->
                <div class="icon">
                    <!-- edit -->
                    <a href="" ><i class="fa fa-pen"></i></a>
                    <!-- delete -->
                    <a href="../controllers/delete_post.php?id=<?php echo $post['post_id'] ?>" ><i class="fa fa-trash"></i></a>
                </div>

        </div>
        <?php endforeach ?>

        </div>

    </div>

        </div>
<?php require_once ('../templates/footer.php');?>