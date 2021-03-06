<?php include 'includes/header.php';?>
<?php ob_start();?>


<?php
if(isset($_SESSION['username'])){

    
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



                        <?php
// this is working
if(isset($_GET['edit_user'])){
    $the_user_id=$_GET['edit_user'];
    $query="SELECT * FROM users WHERE user_id= $the_user_id ";
$select_users_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_users_query)){
      $user_id= $row['user_id'];
      $user_name= $row['username'];
      $user_password= $row['user_password'];
      $user_firstname= $row['user_firstname'];
      $user_lastname= $row['user_lastname'];
      $user_email= $row['user_email'];
      $user_image= $row['user_image'];
      $user_role= $row['user_role'];
    
}
}
// end of edit query

// begining of update query
if(isset($_POST['update_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // query statement
    
$query="UPDATE users SET ";
$query.="user_firstname='{$user_firstname}', ";
$query.="user_lastname= '{$user_lastname}', ";
$query.="user_role='{$user_role}', ";
$query.="username='{$username}', ";
$query.="user_email= '{$user_email}', ";
$query.="user_password= '{$user_password}' ";
$query.="WHERE user_id ={$the_user_id} ";
$update_user_query=mysqli_query($connection,$query);
confirm($update_user_query);

$create_user_query=mysqli_query($connection,$query);
confirm($create_user_query);
}
 ?>





 
<!-- html form start -->
<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">
<label for="post_author">Firstname</label>
<input type="text" class="form-control" value="<?php echo $user_firstname?>" name="user_firstname" required>
</div>

<div class="form-group">
<label for="post_status">Lastname</label>
<input type="text" class="form-control"  value="<?php echo $user_lastname?>"name="user_lastname" required>
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

</div>

<!-- end -->



<!-- <div class="form-group">
<label for="post_image">Post image</label>
<input type="file"  name="post_image">
</div> -->



<div class="form-group">
<label for="post_tag">Username</label>
<input type="text" value="<?php echo $user_name?>" class="form-control" name="username" required>
</div>

<div class="form-group">
<label for="post_content">Email</label>
<input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email" required>
</div>


<div class="form-group">
<label for="post_content">Password</label>
<input type="password"  value="<?php echo $user_password?>" class="form-control"name="user_password" required>
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
    