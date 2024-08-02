
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="del" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_del" value="Don't Delete Account">
        </div>
    </form>

<?php
$username_session=$_SESSION['username'];
if(isset($_POST['del']))
{
    $del_query="delete from `user` where u_name='$username_session'";
    $run_query=mysqli_query($con,$del_query);
    if($run_query)
    {
        session_destroy();
        echo "<script>alert('Account deleted successfully !!')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont_del']))
{
    echo "<script>window.open('profile.php','_self')</script>";
}
?>