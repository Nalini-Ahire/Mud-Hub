<?php
if(isset($_GET['del_user']))
{
    $del_id=$_GET['del_user'];
    // echo $del_cat;

    // delete query
    $del_query="delete from `user` where u_id=$del_id";
    $run_query=mysqli_query($con,$del_query);
    if($run_query)
    {
        echo "<script>alert('User has been deleted successfully !!')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}
?>