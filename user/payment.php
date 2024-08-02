<!-- php -->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .logo
        {
            width:7%;
            height:7%;
        }
    </style>
</head>
<style>
    body
    {
        overflow-x:hidden;
    }
    .payment_img
    {
        width:90%;
        margin:auto;
        display:block;
    }
    
</style>
<body>
    <?php
    $user_ip_adr=get_ip_address();
    $get_user="select * from `user` where u_ip_adr='$user_ip_adr'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['u_id'];
    ?>

   <div class="container">
    <h2 class="text-center text-info">Payment Options
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../images/upi.avif" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none"><h2 class="text-center">Pay offline</h2></a>
            </div>
        </div>
    </h2>
   </div> 
</body>
</html>