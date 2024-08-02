<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registrationt</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body
        {
            overflow-x:hidden;
        }
    </style>

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username  -->
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="username"/>
                    </div>
                    
                    
                    <!-- password  -->
                    <div class="form-outline mb-4">
                        <label for="userpass" class="form-label">Password</label>
                        <input type="password" id="useremail" class="form-control" placeholder="Enter your user password" autocomplete="off" required="required" name="userpass"/>
                    </div>
                    
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger text-decoration-none">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>

<!-- php code -->
<?php 
if(isset($_POST['user_login']))
{ 
    $username=$_POST['username'];
    $userpass=$_POST['userpass'];
    $select_query="select * from `user` where u_name='$username' ";
    $result_query=mysqli_query($con,$select_query);
    $row_cnt=mysqli_num_rows($result_query);
    $row_data=mysqli_fetch_assoc($result_query);
    $user_ip_adr=get_ip_address() ;

    //cart item
    $select_cart_query="select * from `cart_details` where ip_adr='$user_ip_adr' ";
    $result_cart=mysqli_query($con,$select_cart_query);
    $row_cnt_cart=mysqli_num_rows($result_cart);


    if($row_cnt > 0)
    {
        $_SESSION['username']=$username;
        if(password_verify($userpass,$row_data['u_pass']))
        {
            //echo "<script>alert('Login Successful !!')</script>";
            if($row_cnt==1 and $row_cnt_cart==0)
            {
                $_SESSION['username']=$username;
                echo "<script>alert('Login Successfully !!')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
            else
            {
                 $_SESSION['username']=$username;
                echo "<script>alert('Login Successfully !!')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }
        else
        {
            echo "<script>alert('Invalid Credentials !')</script>"; 
        }
    }
    else
    {
        echo "<script>alert('User does not exist')</script>";
        echo "<script>window.open('user_registration.php','_self')</script>";
    }
}
?>