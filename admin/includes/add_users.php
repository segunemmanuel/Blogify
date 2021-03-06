<?php
if(isset($_POST['create_user'])){
    // $user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // $post_image=$_FILES['post_image']['name'];
    // $post_image_temp=$_FILES['post_image']['tmp_name'];
    // $post_date=date('d-m-y');

    // move_uploaded_file($post_image_temp,"../images/$post_image");

$query="INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role) ";
$query.="VALUES ('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}', '{$user_email}','{$user_role}') ";

$create_user_query=mysqli_query($connection,$query);
confirm($create_user_query);
}
 ?>


<!-- form start -->
<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">
<label for="post_author">Firstname</label>
<input type="text" class="form-control" name="user_firstname" required>
</div>

<div class="form-group">
<label for="post_status">Lastname</label>
<input type="text" class="form-control" name="user_lastname" required>
</div>


<!-- category -->

<div class="form-group">
<label for="post_category">User role</label>

<select name="user_role" id="" class="form-control">

<option value="admin">Select option</option>
<option value="admin">Admin</option>
<option value="subscribers">Subscribers</option>

</select>

</div>

<!-- end -->



<!-- <div class="form-group">
<label for="post_image">Post image</label>
<input type="file"  name="post_image">
</div> -->



<div class="form-group">
<label for="post_tag">Username</label>
<input type="text" class="form-control"name="username" required>
</div>

<div class="form-group">
<label for="post_content">Email</label>
<input type="email" class="form-control"name="user_email" required>
</div>


<div class="form-group">
<label for="post_content">Password</label>
<input type="password" class="form-control"name="user_password" required>
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="create_user" value= "Add user">

</div>

</form>