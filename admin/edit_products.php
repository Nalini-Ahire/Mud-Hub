<?php
if(isset($_GET['edit_products']))
{
    $edit_id=$_GET['edit_products'];
    $get_data="select * from `products` where p_id=$edit_id";
    $run_data=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($run_data);
    $product_title=$row['p_title'];
    $product_des=$row['p_des'];
    $product_keyword=$row['p_keyword'];
    $cat_id=$row['cat_id'];
    $product_img1=$row['p_img1'];
    $product_img2=$row['p_img2'];
    $product_img3=$row['p_img3'];
    $product_price=$row['p_price'];
    

    // fetching cat
    $select_cat="select * from `categories` where cat_id=$cat_id";
    $run_cat=mysqli_query($con,$select_cat);
    $row_cat=mysqli_fetch_assoc($run_cat);
    $cat_title=$row_cat['cat_title'];
    // echo $cat_name;
}
?>


<div class="container mt-5">
    <h3 class="text-center text-success">Edit Products</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" value="<?php echo $product_title; ?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_des" class="form-label">Product Description</label>
            <input type="text" id="product_des" name="product_des" value="<?php echo $product_des; ?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Product Keywords</label>
            <input type="text" id="product_keyword" name="product_keyword" value="<?php echo $product_keyword; ?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_cat" class="form-label">Product Categories</label>
            <select name="product_cat" class="form-select">
                <option value="<?php echo $cat_id;?>"><?php echo $cat_title;?></option>
                <?php
                $select_cat_all="select * from `categories`";
                $run_cat_all=mysqli_query($con,$select_cat_all);
                while($row_cat_all=mysqli_fetch_assoc($run_cat_all))
                {
                    $cat_title=$row_cat_all['cat_title'];
                    $cat_id=$row_cat_all['cat_id'];
                    echo "<option value='$cat_id'>$cat_title</option>";
                }
                
                ?>
                
                
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img1" class="form-label">Product Image 1</label>
            <div class="d-flex">
                <input type="file" id="product_img1" name="product_img1"  class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_img1; ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img2" class="form-label">Product Image 2</label>
            <div class="d-flex">
                <input type="file" id="product_img1" name="product_img2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_img2; ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img3" class="form-label">Product Image 3</label>
            <div class="d-flex">
                <input type="file" id="product_img3" name="product_img3" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_img3; ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" value="<?php echo $product_price; ?>" class="form-control" required="required">
        </div>

        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>


<!-- editing products -->
<?php
if(isset($_POST['edit_product']))
{
    $product_title=$_POST['product_title'];
    $product_des=$_POST['product_des'];
    $product_keyword=$_POST['product_keyword'];
    $product_cat=$_POST['product_cat'];
    $product_price=$_POST['product_price'];

    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    $product_tmp_img1=$_FILES['product_img1']['tmp_name'];
    $product_tmp_img2=$_FILES['product_img2']['tmp_name'];
    $product_tmp_img3=$_FILES['product_img3']['tmp_name'];

    //check for fields empty or not
    if($product_title=='' or $product_des=='' or $product_keyword=='' or $product_cat=='' or $product_img1=='' or $product_img2=='' or $product_img3=='' or $product_price=='')
    {
        echo "<script>alert('Please fill all fields and continue the process')</script>";
    }
    else
    {
        move_uploaded_file($product_tmp_img1,"./product_images/$product_img1");
        move_uploaded_file($product_tmp_img2,"./product_images/$product_img2");
        move_uploaded_file($product_tmp_img3,"./product_images/$product_img3");

        
        // update products
        $update_query="update `products` set p_title='$product_title',p_des='$product_des',p_keyword='$product_keyword',cat_id='$product_cat',p_img1='$product_img1',p_img2='$product_img2',p_img3='$product_img3',p_price=$product_price,date=NOW() where p_id=$edit_id";
        $run_query=mysqli_query($con,$update_query);
        if($run_query)
        {
            echo "<script>alert('Product Updated Successfully !!')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        }
    }
}
?>