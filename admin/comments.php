<?php include 'includes/header.php';?>
<?php include 'functions.php';?>
<?php ob_start();?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'includes/navigation.php'?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome to admin
                            <small>Author name</small>
                        </h1>


                        <?php


if(isset($_GET['source'])){
$source=$_GET['source'];

}

else{

    $source=' ';
}
switch($source){
    case 'add_posts';
    include "includes/add_posts.php";

    break;

    case 'edit_comments';
    include "includes/edit_comments.php";
    
    break;
    
    default:
    include "includes/view_comments.php";



 
}
?>



                            
                        </tbody>
                        </table>

               </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    <?php include 'includes/footer.php' ?>
    