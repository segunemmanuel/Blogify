<?php
// get posts from db table posts
if(isset($_GET['p_id'])){
    $the_post_id=$_GET['p_id'];
    // echo $the_post_id;
    $query="SELECT * FROM posts WHERE post_id=$the_post_id";
    $select_posts_by_id=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_posts_by_id)){
        $post_id= $row['post_id'];
      $post_cat_id= $row['post_category_id'];
      $post_title= $row['post_title'];
      $post_author= $row['post_author'];
      $post_date= $row['post_date'];
      $post_image= $row['post_image'];
      $post_content= $row['post_content'];
      $post_tags= $row['post_tags'];
      $post_comment=$row['post_comment_count'];
      $post_status= $row['post_status'];
    }
}
// update posts
if(isset($_POST['update_post'])){
    $post_title = $_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_tag=$_POST['post_tag'];
    $post_category_id=$_POST['post_category'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];
    $post_content=$_POST['post_content'];

    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query="UPDATE posts SET ";
    $query.="post_title='{$post_title}', ";
$query.="post_category_id='{$post_category_id}', ";
    $query.="post_date= now(), ";
    $query.="post_author='{$post_author}', ";
    $query.="post_status='{$post_status}', ";
    $query.="post_tags='{$post_tags}', ";
    $query.="post_content='{$post_content}', ";
$query.="post_image='{$post_image}' ";
    $query.="WHERE post_id ={$the_post_id} ";
    $update_post=mysqli_query($connection,$query);
confirm($update_post);
echo "<p class='bg-success'> Post updated:" . " ". "<a href='../post.php?p_id={$post_id}'>View post </a>or <a href='posts.php'>Edit More post</a> </p>";
}
?>
<h1>Edit Posts</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="title">Post Title</label>
<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
</div>


<div class="form-group">
<label for="post_category">Post Category id </label>
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

<div class="form-group">
<label for="post_author">Post Author</label>
<input  value="<?php echo $post_author; ?>"type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
<select name="post_status" id="" class="form-control">  
<option value='<?php $post_status;?>'>   <?php echo $post_status; ?> </option>
<?php    
if($post_status=='published'){
    
    echo "<option value='draft'>Draft </option>";
}
else{
    echo "<option value='published'>Published </option>";
    
}
?>

<option value=""></option>

</select>

</div>

<div class="form-group">
<label for="post_image">Post image</label>
<input  type="file"  name="post_image">
<img  src="../images/<?php echo $post_image;?>" width="50px">
</div>
<div class="form-group">
<label for="post_tag">Post tag</label>
<input value="<?php echo $post_tags; ?>" type="text" class="form-control"name="post_tag">
</div>
<div class="form-group">
<label for="post_content">Post Content</label>
<textarea  id="body" name="post_content"  cols="30" class="form-control" rows="10"> <?php echo $post_content; ?>
</textarea>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" name="update_post">
</div>




</form>