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
    <title>Admin Login</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!--bootstrap font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="../style.css">

    <style>
        body
        {
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2> 
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-4">
                <img src="../images/admin_reg.png" class="img-fluid w-100" alt="admin_registration">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required="required"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userpass" class="form-label">Password</label>
                        <input type="password" id="userpass" name="userpass" class="form-control" placeholder="Enter your Password" required="required"/>
                    </div>
                    <div>
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
                        <p class="small fw-bold mt-2 pt-1"> Don't have an account ? <a href="admin_registration.php" class="link-danger text-decoration-none">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php 
if(isset($_POST['admin_login']))
{ 
    $a_name=$_POST['username'];
    $a_pass=$_POST['userpass'];
    $select_query="select * from `admin` where a_name='$a_name' ";
    $result_query=mysqli_query($con,$select_query);
    $row_cnt=mysqli_num_rows($result_query);
    $row_data=mysqli_fetch_assoc($result_query);
    if($row_cnt > 0)
    {
        $_SESSION['a_name']=$a_name;
        if(password_verify($a_pass,$row_data['a_pass']))
        {
            echo "<script>alert('Login Successful !!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }  
        else
        {
            echo "<script>alert('Invalid Credentials !')</script>"; 
        }
    }
    else
    {
        echo "<script>alert('User does not exist')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";
    }
}
?>