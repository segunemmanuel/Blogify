<?php include 'includes/header.php'?>
    <div id="wrapper">
<?php
// find out how many users are presently logged in!
$session= session_id();
$time=time();
$time_out_in_seconds = 60;
$time_out = $time - $time_out_in_seconds;
$query="SELECT * FROM users_online WHERE session ='$session'" ;
$send_query=mysqli_query($connection,$query);
$count=mysqli_num_rows($send_query);
if($count == NULL){
    mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session', '$time')");
}
else{
    mysqli_query($connection, "UPDATE users_online SET time='$time'  WHERE session = '$session' ");
}
$user_online_query= mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out' ");
$count_user= mysqli_num_rows($user_online_query);


?>
        <!-- Navigation -->
        <?php include 'includes/navigation.php'?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <!-- widgets -->
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="text-right col-xs-9">
                    <?php
                    $query="SELECT * FROM posts";
                    $select_all_post=mysqli_query($connection,$query);
                    $post_counts=mysqli_num_rows($select_all_post);
                    
                    ?>    
                  <div class='huge'><?php echo $post_counts?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="text-right col-xs-9">
                    <?php
                    $query="SELECT * FROM comments";
                    $select_all_comments=mysqli_query($connection,$query);
                    $comment_counts=mysqli_num_rows($select_all_comments);
                    
                    ?>
                    
                     <div class='huge'><?php echo $comment_counts; ?></div>
                      <div>Comments</div>
                    </div>
                    </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="text-right col-xs-9">
                    <?php
                    $query="SELECT * FROM users";
                    $select_all_users=mysqli_query($connection,$query);
                    $user_counts=mysqli_num_rows($select_all_users);
                    ?>

                    
                    <div class='huge'><?php echo $user_counts; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="text-right col-xs-9">
                    <?php
                    $query="SELECT * FROM categories";
                    $select_all_cat=mysqli_query($connection,$query);
                    $cat_counts=mysqli_num_rows($select_all_cat);
                    ?>


                        <div class='huge'><?php echo $cat_counts; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->



                <?php
                
                $query="SELECT * FROM posts WHERE post_status = 'draft' ";
                $select_all_draft_post=mysqli_query($connection,$query);
                $post_draft_counts=mysqli_num_rows($select_all_draft_post);

  
                $query="SELECT * FROM posts WHERE post_status = 'published' ";
                $select_all_pub_post=mysqli_query($connection,$query);
                $post_pub_counts=mysqli_num_rows($select_all_pub_post);

                


                $query="SELECT * FROM comments WHERE comment_status = 'Unapproved' ";
                $select_all_uncomments=mysqli_query($connection,$query);
                $uncomment_counts=mysqli_num_rows($select_all_uncomments);
                
                $query="SELECT * FROM users WHERE user_role = 'subscriber' ";
                $select_all_subscriber=mysqli_query($connection,$query);
                $subscriber_counts=mysqli_num_rows($select_all_subscriber);
                

                
                ?>

<div class="row">
    
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php
          $element_text=['All post', 'Active posts','Draft Post','Comments','Unapproved Comments','Users','Subscribers','Categories'];
          $element_count=[    $post_counts,   $post_pub_counts,   $post_draft_counts,$comment_counts,$uncomment_counts,$user_counts,$subscriber_counts,$cat_counts];
          for($i=0; $i<8; $i++){
            //   add js code
              echo "[ '{$element_text[$i] }' ".","."{$element_count[$i]}],";
          

          }
          
          ?>



        //   ['Posts', 1000],
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: auto; height: 500px;"></div>
    
</div>

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php include 'includes/footer.php'?>