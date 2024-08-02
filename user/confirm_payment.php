<!--connect file-->
<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    $select_data="select * from `order` where o_id=$order_id";
    $result_data=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result_data);
    $invoice_no=$row_fetch['invoice_no'];
    $amt_due=$row_fetch['amt_due'];
}
 if(isset($_POST['confirm_payment']))
 {
    $invoice_no=$_POST['invoice_no'];
    $amount=$_POST['amt_due'];
    $pay_mode=$_POST['payment_mode'];
    $insert_payment="insert into `payment` (o_id,invoice_no,amt,pay_mode,pay_date) values ($order_id,$invoice_no,$amount,'$pay_mode',NOW())";
    $run_payment=mysqli_query($con,$insert_payment);
    if($run_payment)
    {
        echo "<h3 class='text-center text-light'>Successfully completed payment</h3>";
        echo "<script>window.open('profile.php?my_order','_self')</script>";
    }
    $update_order="update `order` set o_status='Complete' where o_id=$order_id";
    $run_order=mysqli_query($con,$update_order);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-secondary">
   <div class="container my-5">
   <h1 class="text-center text-light">Confirm Payment</h1>
    <form action="" method="post">
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="text" class="form-control w-50 m-auto" name="invoice_no" value="<?php echo $invoice_no ?>">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-light">Amount</label>
            <input type="text" class="form-control w-50 m-auto" name="amt_due" value="<?php echo $amt_due ?>">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <select name="payment_mode" class="form-select w-50 m-auto">
                <option>Select Payment Mode</option>
                <option>UPI</option>
                <option>Net Banking</option>
                <option>Paypal</option>
                <option>Cash On Delivery</option>
                <option>Pay Offline</option>
            </select>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
        </div>
    </form>
   </div> 
</body>
</html>