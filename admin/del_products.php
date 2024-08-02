<?php
if(isset($_GET['del_products']))
{
    $del_id=$_GET['del_products'];
    // echo $del_id;

    // delete query
    $del_query="delete from `products` where p_id=$del_id";
    $run_query=mysqli_query($con,$del_query);
    if($run_query)
    {
        echo "<script>alert('Prouct deleted successfully !!')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>