<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username  -->
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="username"/>
                    </div>
                    <!-- email  -->
                    <div class="form-outline mb-4">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="text" id="useremail" class="form-control" placeholder="Enter your user email" autocomplete="off" required="required" name="useremail"/>
                    </div>
                    <!-- image  -->
                    <div class="form-outline mb-4">
                        <label for="useriamge" class="form-label">User Image</label>
                        <input type="file" id="userimage" class="form-control" required="required" name="userimage"/>
                    </div>
                    <!-- password  -->
                    <div class="form-outline mb-4">
                        <label for="userpass" class="form-label">Password</label>
                        <input type="password" id="userpass" class="form-control" placeholder="Enter your user password" autocomplete="off" required="required" name="userpass"/>
                    </div>
                    <!-- confirm password  -->
                    <div class="form-outline mb-4">
                        <label for="conf_userpass" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_userpass" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_userpass"/>
                    </div>
                    <!-- address  -->
                    <div class="form-outline mb-4">
                        <label for="useraddr" class="form-label">Address</label>
                        <input type="text" id="useraddr" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="useraddr"/>
                    </div>
                    <!-- contact  -->
                    <div class="form-outline mb-4">
                        <label for="usermob" class="form-label">Contact</label>
                        <input type="text" id="usermob" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="usermob"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger text-decoration-none">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>

<!-- php code -->
<?php 
if(isset($_POST['user_register']))
{
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $userpass=$_POST['userpass'];  
    $hash_pass=password_hash($userpass,PASSWORD_DEFAULT);
    $conf_userpass=$_POST['conf_userpass'];
    $useraddr=$_POST['useraddr'];
    $usermob=$_POST['usermob'];
    $userimage=$_FILES['userimage']['name'];
    $userimage_tmp=$_FILES['userimage']['tmp_name'];
    $user_ip_adr=get_ip_address();

    //select query
    $select_query="select * from `user` where u_name='$username' or u_email='$useremail' or u_mob='$usermob'";
    $result_query=mysqli_query($con,$select_query);
    $row_cnt=mysqli_num_rows($result_query);
    if($row_cnt > 0)
    {
        echo "<script>alert('username is already exist')</script>";
    }
    else if($userpass != $conf_userpass)
    {
        echo "<script>alert('Password does not match')</script>";
    }
    else
    {
    //insert user data
    move_uploaded_file($userimage_tmp,"./user_images/$userimage");
    $insert_query="insert into `user` (u_name,u_email,u_pass,u_img,u_ip_adr,u_adr,u_mob) values ('$username','$useremail','$hash_pass','$userimage','$user_ip_adr','$useraddr','$usermob')";
    $execute_query=mysqli_query($con,$insert_query);
    
    if($execute_query)
    {
        echo "<script>alert('Data Inserted successfully')</script>";
        echo "<script>window.open('user_login.php','_self')</script>";
    }
    else
    {
        die(mysqli_error($con));
    }
    }
    

    //selecting cart items
    $select_cart_item="select * from `cart_details` where ip_adr='$user_ip_adr'";
    $result_cart_item=mysqli_query($con,$select_cart_item);
    $row_cnt=mysqli_num_rows($result_cart_item);
    if($row_cnt > 0)
    {
        $_SESSION['username']=$username;
        echo "<script>alert('You have items in your cart !!')</script>";
        echo "<script>window.open('check_out.php','_self')</script>";
    }
    else
    {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>