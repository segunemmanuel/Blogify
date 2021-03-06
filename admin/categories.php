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
<div class="col-xs-6">
<?php  insert_cat(); ?>

<form action="categories.php" method="post">
    <div class="form-group">
        <label for="cat_title">Add Category</label>
        <input type="text" name="cat_title" class="form-control">
        
    </div>
    <div class="form-group">
        <input type="submit" name="submit"  class="btn btn-primary">
        
    </div>
</form>

<!-- update and include code -->
<?php
if(isset($_GET['edit'])){
    $cat_id=$_GET['edit'];
    include "includes/update_cat.php";
}
?>


</div>     
               <!-- add category form -->

               <div class="col-xs-6">
               <?php
         

            ?>
               <table class="table table-bordered table-hover">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Category Title</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php 
                //    Find all categories query
                
                    find_cat();
                            ?>

                     <!-- delete categories -->
                     <?php

delete_all_cat();
// end of delete categories
                     ?>
                   </tbody>
               </table>
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
    