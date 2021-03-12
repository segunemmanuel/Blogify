    <?php include 'includes/db.php'?>
    <?php session_start() ?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">



        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Front</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
            <?php
            $query="SELECT * FROM categories";
            $select_all_categories=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_all_categories)){
               $cat_title= $row['cat_title'];
               $cat_id= $row['cat_id'];
               echo "<li class='navbar-link'><a href='category.php?category={$cat_id}'>$cat_title</a></li>";
            }
            ?>
       
                    <li class="navbar-link">
                        <a href="admin/index.php">Admin</a>
                    </li>

                    <li class="navbar-link">
                        <a href="registration.php">Register</a>
                    </li>
<?php

if(isset($_SESSION['user_email'])){
    if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];
echo "<li class='navbar-link'><a href='admin/posts.php?source=edit_posts&p_id={$post_id}'> Edit Post</a></li>";
    }
}


?>

                     
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>