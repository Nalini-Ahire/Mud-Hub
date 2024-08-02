<?php
if(isset($_GET['del_cat']))
{
    $del_cat=$_GET['del_cat'];
    // echo $del_cat;

    // delete query
    $del_query="delete from `categories` where cat_id=$del_cat";
    $run_query=mysqli_query($con,$del_query);
    if($run_query)
    {
        echo "<script>alert('Category has been deleted successfully !!')</script>";
        echo "<script>window.open('./index.php?view_cat','_self')</script>";
    }
}
?>