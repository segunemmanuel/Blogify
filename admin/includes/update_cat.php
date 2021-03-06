<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
        if(isset($_GET['edit'])){
            $cat_id=$_GET['edit'];
 $query="SELECT * FROM categories WHERE cat_id= $cat_id ";
 $select_all_categories_id=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_all_categories_id)){
           $cat_id= $row['cat_id'];
           $cat_title= $row['cat_title'];
        ?>


<?php }} ?>

<input value="<?php if(isset($cat_title)) {echo $cat_title;}?>" type="text" name="cat_title" class="form-control">

<?php


// update 

if(isset($_POST['update'])){
    $cat_title=$_POST['cat_title'];
    // $cat_id= $_GET['edit'];
    $query="UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id= {$cat_id} " ;
    $update_query=mysqli_query($connection,$query);
    if(!$update_query){
        die('Error'.mysqli_error($connection));
    }
     
}
?>
    </div>
    <div class="form-group">
        <input type="submit" name="update" value="Update" class="btn btn-primary">
    </div>
</form>