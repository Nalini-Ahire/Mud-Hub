<!-- php code -->
<?php
if(isset($_GET['edit_acc']))
{
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `user` where u_name='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['u_id'];
    $user_name=$row_fetch['u_name'];
    $user_email=$row_fetch['u_email'];
    $user_adr=$row_fetch['u_adr'];
    $user_mob=$row_fetch['u_mob'];
    $user_image=$row_fetch['u_img'];
    

}

if(isset($_POST['userupdate']))
{
    $update_id=$user_id;
    $user_name=$_POST['username'];
    $user_email=$_POST['useremail'];
    $user_adr=$_POST['useraddr'];
    $user_mob=$_POST['usermob'];
    $user_img=$_FILES['userimage']['name'];
    $user_img_tmp=$_FILES['userimage']['tmp_name'];
    
    move_uploaded_file($user_img_tmp,"./user_images/$user_img");
    $update_data="update `user` set u_name='$user_name',u_email='$user_email',u_img='$user_img',u_adr='$user_adr',u_mob=$user_mob where u_id=$update_id";
    $result_data=mysqli_query($con,$update_data);
    if($result_data)
    {
        echo "<script>alert('Data updated successfuly !!')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name ?>" name="username" >
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="useremail" >
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="userimage" >
            <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_img">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto " value="<?php echo $user_adr ?>" name="useraddr" >
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto " value="<?php echo $user_mob ?>" name="usermob" >
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="userupdate" >
    </form>
</body>
</html>