<?php
include("../includes/connect.php");
if(isset($_POST['insert_product']))
{
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_des'];
    $product_keyword=$_POST['product_keyword'];
    $product_cat=$_POST['product_cat'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accessing images
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    //accessing img tmp name
    $temp_img1=$_FILES['product_img1']['tmp_name'];
    $temp_img2=$_FILES['product_img2']['tmp_name'];
    $temp_img3=$_FILES['product_img3']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_cat=='' or $product_price=='' or $product_img1=='' or $product_img2=='' or $product_img3=='')
    {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else
    {
        move_uploaded_file($temp_img1,"./product_images/$product_img1");
        move_uploaded_file($temp_img2,"./product_images/$product_img2");
        move_uploaded_file($temp_img3,"./product_images/$product_img3");

        //insert query
        $insert_product="insert into products (p_title,p_des,p_keyword,cat_id,p_img1,p_img2,p_img3,p_price,date,status) values ('$product_title','$product_description','$product_keyword','$product_cat','$product_img1','$product_img2','$product_img3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_product);
        if($result_query)
        {
            echo "<script>alert('Successfully Inserted the product !!!')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--bootstrap font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <!--css file-->
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form-->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product title" autocomplete="off" required/>
            </div>

            <!--Description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="product_des" id="product_des" class="form-control" placeholder="Enter Product description" autocomplete="off" required/>
            </div>

            <!--product keyword-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keywords</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required/>
            </div>

            <!--category-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_cat" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    $select_query="select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $category_title=$row['cat_title'];
                        $category_id=$row['cat_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                    
                </select>
            </div>

            <!--Image1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img1" class="form-label">Product Image 1</label>
                <input type="file" name="product_img1" id="product_img1" class="form-control" required/>
            </div>

            <!--Image2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img2" class="form-label">Product Image 2</label>
                <input type="file" name="product_img2" id="product_img2" class="form-control">
            </div>

            <!--Image3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img3" class="form-label">Product Image 3</label>
                <input type="file" name="product_img3" id="product_img1" class="form-control">
            </div>

            <!--Product price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required/>
            </div>

            <!--insert products-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>


        </form>
    </div>




<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>