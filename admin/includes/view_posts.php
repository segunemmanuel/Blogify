<?php
if(isset($_POST['checkBoxArray'])){
foreach($_POST['checkBoxArray'] as $checkBoxValue ){
    $bulk_options = $_POST['bulkOptions'];
    // $post_id=$_POST['post_id'];
switch($bulk_options){
     
    
    case 'published':
$query= "UPDATE posts SET post_status= '{$bulk_options}' WHERE post_id= {$checkBoxValue}  ";
$update_published_status=mysqli_query($connection,$query);
confirm($update_published_status);
        break;
    
        case 'draft':
        $query= "UPDATE posts SET post_status= '{$bulk_options}' WHERE post_id= {$checkBoxValue}  ";
        $update_draft_status=mysqli_query($connection,$query);
        confirm($update_draft_status);
        break;

            case 'delete':
            $query= "DELETE FROM posts WHERE post_id = {$checkBoxValue} ";
             $update_delete_status=mysqli_query($connection,$query);
            confirm($update_delete_status);
            break;
}
    
}

}

?>
<form action="" method="post">
<table class="table table-bordered table-hover table-responsive">
<div class="row">

<div id="bulkOptionContainer" class="col-xs-4"> 
<select name="bulkOptions" class="form-control">
<option value="">Select option</option>
<option value="published">Publish</option>
<option value="draft">Draft</option>
<option value="delete">Delete</option>
</select>
</div>
<div class="col-xs-4">
<input type="submit" class="btn btn-success" value="Apply">
<a href="add_posts.php" class="btn btn-primary" href="add_post.php">Add new</a>

</div>

</div>

<!-- begining of table -->
<thead>
    <tr>
    <th> <input type="checkbox" id="selectAllBoxes">   </th>
        <th>Post id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
</thead>
<tbody>
<?php
$query="SELECT * FROM posts";
$select_all_posts=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_all_posts)){
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

      echo "<tr>";

      

      ?>
      <td> <input type='checkbox' name='checkBoxArray[]' value=<?php echo $post_id?> </td>

      <?php
      
      echo "<td>{$post_id}</td>";
      echo "<td> {$post_author}</td>";
      echo "<td>{$post_title}</td>";
      $query="SELECT * FROM categories WHERE cat_id= {$post_cat_id} ";
      $select_all_categories_id=mysqli_query($connection,$query);
     while($row=mysqli_fetch_assoc($select_all_categories_id)){
                $cat_id= $row['cat_id'];
                $cat_title= $row['cat_title'];
      
      echo "<td>{$cat_title}</td>";

     }

      echo "<td>{$post_status} </td>";
      echo "<td> <img src='../images/$post_image' width='90px'alt='ímg'></td>";
      echo "<td> {$post_tags}</td>";
      echo "<td>{$post_comment}</td>";
    //   echo "<td>{$post_content}</td>";
      echo "<td> {$post_date}</td>";
      echo "<td><a href='posts.php?source=edit_posts&p_id=$post_id'>Edit</a></td>";
      echo "<td><a href='posts.php?delete=$post_id'> Delete</a></td>";
      
      echo "</tr>";

   

}

?>
<?php

if(isset($_GET['delete'])){
    $the_post_id=$_GET['delete'];
    $query ="DELETE FROM posts WHERE post_id={$the_post_id} ";
    $delete_query=mysqli_query($connection,$query);
    header("location:posts.php");exit;

}



?>
</tbody>
</table>

</form>