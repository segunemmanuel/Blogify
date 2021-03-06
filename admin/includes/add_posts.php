<?php
if(isset($_POST['create_post'])){
    $post_title = $_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_tag=$_POST['post_tag'];
    $post_category_id=$_POST['post_category'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];
    $post_content=$_POST['content'];
    $post_date=date('d-m-y');

    move_uploaded_file($post_image_temp,"../images/$post_image");

$query="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";
$query.="VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tag}','{$post_status}') ";

$create_posts_query=mysqli_query($connection,$query);
confirm($create_posts_query);
}
 ?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="title">Post Title</label>
<input type="text" class="form-control" name="post_title">
</div>

<!-- category -->
<div class="form-group">
<label for="post_category">Post Category </label>
<select name="post_category" id="post_category" class="form-control">
<?php 
 $query="SELECT * FROM categories";
 $select_all_categories=mysqli_query($connection,$query);
 confirm($select_all_categories);
while($row=mysqli_fetch_assoc($select_all_categories)){
           $cat_id= $row['cat_id'];
           $cat_title= $row['cat_title'];

echo "<option value='{$cat_id}'>{$cat_title} </option>";
}
        ?>


</select>

</div>


<!-- end -->

<div class="form-group">
<label for="post_author">Post Author</label>
<input type="text" class="form-control" name="post_author">

</div>
<div class="form-group">
<label for="post_status">Post Status</label>
<input type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
<label for="post_image">Post image</label>
<input type="file"  name="post_image">
</div>
<div class="form-group">
<label for="post_tag">Post tag</label>
<input type="text" class="form-control"name="post_tag">
</div>

<div class="form-group">
<label for="post_content">Post Content</label>
<textarea name="content"  cols="30" class="form-control" rows="10"></textarea>

</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" name="create_post">

</div>

</form>