<?php include 'includes/header.php';?>
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


        
<!-- html form start -->
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="post_author">Firstname</label>
<input type="text" class="form-control" value="<?php echo $_SESSION['username']?>" name="user_firstname" required>
</div>

<div class="form-group">
<label for="post_status">Lastname</label>
<input type="text" class="form-control"  value="<?php echo $_SESSION['lastname'] ?>"name="user_lastname" required>
</div>


<!-- category -->

<div class="form-group">
<label for="post_category">User role</label>
<select name="user_role" id="" class="form-control">
<option value="subscriber"><?php echo $_SESSION['user_role'];?></option>
<?php
if($user_role == 'Admin'){
echo "<option value='subscriber'>subscriber</option>";
}
else {
echo "<option value='admin'>admin</option>";

}

?>
</select>
<div class="form-group">
<label for="post_tag">Username</label>
<input type="text" value="<?php echo $_SESSION['username'] ?>" class="form-control" name="username" required>
</div>

<div class="form-group">
<label for="post_content">Email</label>
<input type="email" value="<?php echo $_SESSION['user_email'] ?>" class="form-control" name="user_email" required>
</div>


<div class="form-group">
<label for="post_content">Password</label>
<input type="text"  value="<?php echo $_SESSION['user_password'] ?>" class="form-control"name="user_password" required>
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="update_user" value= "Edit user">

</div>

</form>





                            
                        </tbody>
                        </table>

               </div>
                    </div>
                </div>
                <!-- /.row -->
            <!-- /.container-fluid -->
        <!-- /#page-wrapper -->
    <?php include 'includes/footer.php' ?>
    