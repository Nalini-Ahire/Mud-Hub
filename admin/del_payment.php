<?php
if(isset($_GET['del_payment']))
{
    $del_id=$_GET['del_payment'];
    // echo $del_cat;

    // delete query
    $del_query="delete from `payment` where pay_id=$del_id";
    $run_query=mysqli_query($con,$del_query);
    if($run_query)
    {
        echo "<script>alert('Payment has been deleted successfully !!')</script>";
        echo "<script>window.open('./index.php?all_payment','_self')</script>";
    }
}
?>