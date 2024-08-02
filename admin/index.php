<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!--bootstrap font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="../style.css">
    <style>
    .admin-img
{ 
    width:100px;
    object-fit:contain;
}
.footer
{
    position:absolute;
    bottom:0;
}
body
{
    overflow-x:hidden;
}
.product_img
{
    width:100px;
    object-fit:contain;

}
</style>
</head>
<body>
<!--navbar-->
<div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../images/logo1.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                <?php
      if(!isset($_SESSION['a_name']))
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
      }
      else
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['a_name']."</a>
    </li>";
      }
      ?>
      <li class='nav-item'>
        <a class='nav-link' href='../index.php'>Home</a>
    </li>
      <?php
      if(!isset($_SESSION['a_name']))
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='admin_login.php'>Login</a>
    </li>";
      }
      else
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='./admin_logout.php'>Logout</a>
    </li>";
      }
      ?>
                </ul>
            </nav>
        </div>
    </nav>

    <!--second child-->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!--third child-->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-4">
                <a href="#"><img src="../images/user_profile.png" alt="" class="admin-img" style="margin-right:20px;"></a>
                <?php
      if(!isset($_SESSION['a_name']))
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Admin</a>
    </li>";
      }
      else
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['a_name']."</a>
    </li>";
      }
      ?>
            </div>

            <div class="button text-center">
                <button class="my-3"><a href="insert_product.php" class="nav-link text-dark bg-info my-2"><h5>Insert Products</h5></a></button>
                <button class="my-3"><a href="index.php?view_products" class="nav-link text-dark bg-info my-2"><h5>View Products</h5></a></button>
                <button class="my-3"><a href="index.php?insert_cat" class="nav-link text-dark bg-info my-2"><h5>Insert Categories</h5></a></button>
                <button class="my-3"><a href="index.php?view_cat" class="nav-link text-dark bg-info my-2"><h5>View Categories</h5></a></button>
                <button class="my-3"><a href="index.php?all_order" class="nav-link text-dark bg-info my-2"><h5>All Orders</h5></a></button>
                <button class="my-3"><a href="index.php?all_payment" class="nav-link text-dark bg-info my-2"><h5>All Payments</h5></a></button>
                <button class="my-3"><a href="index.php?list_users" class="nav-link text-dark bg-info my-2"><h5>List Users</h5></a></button>
                <button class="my-3"><a href="./admin_logout.php" class="nav-link text-dark bg-info my-2"><h5>Logout</h5></a></button>
            </div>
        </div>
    </div>

    <!--fourth child-->
    <div class="container my-5">
        <?php
        if(isset($_GET['insert_cat']))
        {
            include('insert_cat.php');
        }
        if(isset($_GET['view_products']))
        {
            include('view_products.php');
        }
        if(isset($_GET['edit_products']))
        {
            include('edit_products.php');
        }
        if(isset($_GET['del_products']))
        {
            include('del_products.php');
        }
        if(isset($_GET['view_cat']))
        {
            include('view_cat.php');
        }
        if(isset($_GET['edit_cat']))
        {
            include('edit_cat.php');
        }
        if(isset($_GET['del_cat']))
        {
            include('del_cat.php');
        }
        if(isset($_GET['all_order']))
        {
            include('all_order.php');
        }
        if(isset($_GET['del_order']))
        {
            include('del_order.php');
        }
        if(isset($_GET['all_payment']))
        {
            include('all_payment.php');
        }
        if(isset($_GET['del_payment']))
        {
            include('del_payment.php');
        }
        if(isset($_GET['list_users']))
        {
            include('list_users.php');
        }
        if(isset($_GET['del_user']))
        {
            include('del_user.php');
        }
        if(isset($_GET['back']))
        {
            include('back.php');
        }
        ?>
    </div>




<!--last child-->
<!-- footer -->
<?php include ('../includes/footer.php');?>
</div>



<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>