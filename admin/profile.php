<?php include 'includes/header.php';?>
<?php ob_start();?>

<?php
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
$query= "SELECT * FROM users WHERE username ='{$username}' ";
$select_user_profile=mysqli_query($sonnection, $query);
while($row == mysqli_fetch_array($select_user_profile)){
    $user_id= $row['user_id'];
    $user_name= $row['username'];
    $user_password= $row['user_password'];
    $user_firstname= $row['user_firstname'];
    $user_lastname= $row['user_lastname'];
    $user_email= $row['user_email'];
    $user_role= $row['user_role'];
}
}
?>
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


  <?php  echo $_SESSION['username']; ?>
        
<!-- html form start -->
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="post_author">Firstname</label>
<input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname" required>
</div>

<div class="form-group">
<label for="post_status">Lastname</label>
<input type="text" class="form-control"  value="<?php echo $_SESSION['lastname']; ?>"name="user_lastname" required>
</div>


<!-- category -->

<div class="form-group">
<label for="post_category">User role</label>
<select name="user_role" id="" class="form-control">
<option value="subscriber"><?php echo $user_role;?></option>
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
<input type="text" value="<?php echo $user_name; ?>" class="form-control" name="username" required>
</div>

<div class="form-group">
<label for="post_content">Email</label>
<input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email" required>
</div>


<div class="form-group">
<label for="post_content">Password</label>
<input type="password"  value="<?php echo $user_password; ?>" class="form-control"name="user_password" required>
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
    