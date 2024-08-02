<!-- php code -->
<?php
if(isset($_GET['edit_cat']))
{
    $edit_cat=$_GET['edit_cat'];
    // echo $edit_cat;
    $get_cat="select * from `categories` where cat_id=$edit_cat";
    $run_query=mysqli_query($con,$get_cat);
    $row=mysqli_fetch_assoc($run_query);
    $cat_title=$row['cat_title'];
    // echo $cat_title;
}

if(isset($_POST['update_cat']))
{
    $category_title=$_POST['cat_title'];
    $update_cat="update `categories` set cat_title='$category_title' where cat_id=$edit_cat";
    $result_update=mysqli_query($con,$update_cat);
    if($result_update)
    {
        echo "<script>alert('Category has been updated successfully !!')</script>";
        echo "<script>window.open('./index.php?view_cat','_self')</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center text-success">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="cat_title" class="form-label">Category Title</label>
            <input type="text" name="cat_title" id="cat_title" class="form-control" value="<?php echo $cat_title; ?>" required="required">
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mb-3" name="update_cat">
    </form>
</div>

