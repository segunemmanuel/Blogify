<?php



function confirm($result){
global $connection;
    if(!$result){
        die('Error'.mysqli_error($connection));
    }
    // return $result;
}

function insert_cat(){
global $connection;
    if(isset($_POST['submit'])) {
        $cat_title= $_POST['cat_title'];
        if($cat_title=="" || empty($cat_title)){
         echo "This field should not be empty";
        }
         else{
             $query= "INSERT INTO categories(cat_title)";
             $query.= "VALUE('{$cat_title}') ";
             $Create_category_query=mysqli_query($connection,$query);
     header('location: categories.php');exit;
             if(!$Create_category_query){
                 die('Error'.mysqli_error($connection));
     
             }
         }
     }
     

}


function find_cat(){
global $connection;
    $query="SELECT * FROM categories";
    $select_all_categories_sidebar=mysqli_query($connection,$query);
 while($row=mysqli_fetch_assoc($select_all_categories_sidebar)){
              $cat_id= $row['cat_id'];
              $cat_title= $row['cat_title'];
              echo "<tr>";
              echo "<td>{$cat_id}</td>";
              echo "<td>{$cat_title}</td>";
              echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
              echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";


              echo "</tr>";
          }

}


function delete_all_cat(){
    if(isset($_GET['delete'])){
        global $connection;
        $the_cat_id=$_GET['delete'];
        $query="DELETE FROM categories WHERE cat_id={$the_cat_id} ";
        $delete_query=mysqli_query($connection,$query);
        header('Location:categories.php');
         
    }
}


?>