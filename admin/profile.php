<?php include 'includes/header.php';?>
<?php include 'functions.php';?>

<?php ob_start();?>

<?php 
if(isset($_GET['source'])){
$username=$_GET['source'];
$query="SELECT * FROM users WHERE username='{$username}' ";
$select_user_profile=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($select_user_profile)){
    $username=$row['username'];
    $password=$row['user_password'];
    $firstname=$row['user_firstname'];
    $lastname=$row['user_lastname'];
    $user_role=$row['user_role'];
    $user_email=$row['user_email'];
}
}

?>


<?php

if(isset($_POST['update_profile'])){
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
$query.="WHERE username ='{$username}' ";
$update_user_query=mysqli_query($connection,$query);
header("Location:profile.php?source={$_SESSION['username']}");exit;

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
        
<!-- html form start -->
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="post_author">Firstname</label>
<input type="text" class="form-control" value="<?php echo $firstname?>" name="user_firstname" required>
</div>

<div class="form-group">
<label for="post_status">Lastname</label>
<input type="text" class="form-control"  value="<?php echo $lastname ?>"name="user_lastname" required>
</div>


<!-- category -->

<div class="form-group">
<label for="post_category">User role</label>
<select name="user_role" id="" class="form-control">
<option value="subscriber"><?php echo $user_role;?></option>
<?php
if($user_role == "admin"){
echo "<option value='subscriber'>Subscriber</option>";
}
else {
echo "<option value='admin'>Admin</option>";

}

?>
</select>
<div class="form-group">
<label for="post_tag">Username</label>
<input type="text" value="<?php echo $username ?>" class="form-control" name="username" required>
</div>

<div class="form-group">
<label for="post_content">Email</label>
<input type="email" value="<?php echo $user_email ?>" class="form-control" name="user_email" required>
</div>


<div class="form-group">
<label for="post_content">Password</label>
<input type="password"  value="<?php echo $password; ?>" class="form-control"name="user_password" required>
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="update_profile" value= "Update Profile">

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
    