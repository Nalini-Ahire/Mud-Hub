<!-- php -->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

if(isset($_GET['user_id']))
{
    $user_id=$_GET['user_id'];
    
}

// getting total items and total price of all items
$get_ip_adr=get_ip_address();
$total_price=0;

//cart query
$cart_price_query="select * from `cart_details` where ip_adr='$get_ip_adr'";
$result_cart_price=mysqli_query($con,$cart_price_query);
$invoice_no=mt_rand();
$status='Pending';
$cnt_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price))
{
    $product_id=$row_price['p_id'];
    $select_product="select * from `products` where p_id=$product_id";
    $select_result=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($select_result))
    {
        $product_price=array($row_product_price['p_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}

//getting quantity from cart
$get_cart="select * from  `cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quan=mysqli_fetch_array($run_cart);
$quan=$get_item_quan['quan'];
if($quan==0)
{
    $quan=1;
    $sub_total=$total_price;
}
else
{
    $quan=$quan;
    $sub_total=($total_price) * ($quan);
}

$insert_order="insert into `order` (u_id,amt_due,invoice_no,total_products,o_date,o_status) values ($user_id,$sub_total,$invoice_no,$cnt_products,NOW(),'$status')";
$result=mysqli_query($con,$insert_order);
if($result)
{
    echo "<script>alert('Orders are submitted sucessfully !!')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}


//order pending query
$insert_pending_order="insert into `pending_order` (u_id,invoice_no,p_id,quan,o_status) values ($user_id,$invoice_no,$product_id,$quan,'$status')";
$result_pending_order=mysqli_query($con,$insert_pending_order);

//delete tems from cart
$empty_cart="delete from `cart_details` where ip_adr='$get_ip_adr'";
$run_query=mysqli_query($con,$empty_cart);

?>

