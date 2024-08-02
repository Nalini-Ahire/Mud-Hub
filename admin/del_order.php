<?php
if(isset($_GET['del_order']))
{
    $del_id=$_GET['del_order'];
    // echo $del_cat;

    // delete query
    $del_query="delete from `order` where o_id=$del_id";
    $run_query=mysqli_query($con,$del_query);
    if($run_query)
    {
        echo "<script>alert('Order has been deleted successfully !!')</script>";
        echo "<script>window.open('./index.php?all_order','_self')</script>";
    }
}
?>