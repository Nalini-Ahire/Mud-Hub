<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <h2 class="text-center mb-5">Admin Registration</h2>
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
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" id="useremail" name="useremail" class="form-control" placeholder="Enter your email-id" required="required"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userpass" class="form-label">Password</label>
                        <input type="password" id="userpass" name="userpass" class="form-control" placeholder="Enter your Password" required="required"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_userpass" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_userpass" name="conf_userpass" class="form-control" placeholder="Enter your Confirm Password" required="required"/>
                    </div>
                    <div>
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="admin_reg">
                        <p class="small fw-bold mt-2 pt-1"> Already have an account ? <a href="admin_login.php" class="link-danger text-decoration-none">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['admin_reg']))
{
    $a_name=$_POST['username'];
    $a_email=$_POST['useremail'];
    $a_pass=$_POST['userpass'];
    $conf_userpass=$_POST['conf_userpass'];  
    $hash_pass=password_hash($a_pass,PASSWORD_DEFAULT);

    //select admin
    $select_query="select * from `admin` where a_name='$a_name' or a_email='$a_email'";
    $result_query=mysqli_query($con,$select_query);
    $row_cnt=mysqli_num_rows($result_query);
    if($row_cnt > 0)
    {
        echo "<script>alert('username is already exist')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
    else if($a_pass != $conf_userpass)
    {
        echo "<script>alert('Password does not match')</script>";
    }
    else
    {
        $insert_query="insert into `admin` (a_name,a_email,a_pass) values ('$a_name','$a_email','$hash_pass')";
        $execute_query=mysqli_query($con,$insert_query);
        if($execute_query)
        {
            echo "<script>alert('Data Inserted successfully')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
        else
        {
            die(mysqli_error($con));
        }
    }
}
?>