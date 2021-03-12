<?php include 'includes/header.php'?>
<?php include 'includes/navbar.php'?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">

<?php

if(isset($_GET['p_id'])){
    $post_id =$_GET['p_id'];
    $post_author  =$_GET['author'];
    
}
$query="SELECT * FROM posts WHERE post_author = '{$post_author}' ";
$select_all_posts=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_all_posts)){
    $post_title=$row['post_title'];
    $post_id=$row['post_id'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];

?>
            
<!-- <h1 class="page-header">
                   Page Heading
                    <small>Secondary Text</small>
                </h1> -->
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                  Posted by <?php echo $post_author?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

    <hr>
    

<?php } ?>


      <!-- Blog Comments -->

      <?php
      if(isset($_POST['create_comment'])){
        
          $post_id=$_GET['p_id'];
          $comment_author=$_POST['comment_author'];
          $comment_email=$_POST['comment_email'];
          $comment_content=$_POST['comment_content'];
          
          $query= "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
          $query.= "VALUES ($post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";
        $create_comment_query=mysqli_query($connection,$query);
        if(!$create_comment_query){
            die("error".mysqli_error($connection));
        }


        $query =  "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
        $query .= "WHERE post_id = $post_id ";
        $update_comment_count=mysqli_query($connection,$query);
        
      }
       
      ?>
      
                <!-- Comments Form -->
                
    
            </div>

            <!-- Blog Sidebar Widgets Column -->
<?php include 'includes/sidebar.php'?>
        </div>
        <!-- /.row -->
    </div>
        <hr>
        <?php include 'includes/footer.php'?>