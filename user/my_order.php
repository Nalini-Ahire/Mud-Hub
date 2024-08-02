<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>

</head>
<body> 
    <?php
    $user_name=$_SESSION['username'];
    $get_user="select * from `user` where u_name='$user_name'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['u_id'];
    // echo $user_id;
    ?>
    <h3 class="text-success">All my orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th class="bg-info">Sr No.</th>
                <th class="bg-info">Amount Due</th>
                <th class="bg-info">Total Products</th>
                <th class="bg-info">Invoice Number</th>
                <th class="bg-info">Date</th>
                <th class="bg-info">Complete/Incomplete</th>
                <th class="bg-info">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $order_details="select * from `order` where u_id=$user_id";
            $result_order=mysqli_query($con,$order_details);
            $sr_no=1;
            while($row_data=mysqli_fetch_assoc($result_order))
            {
                $order_id=$row_data['o_id'];
                $amt_due=$row_data['amt_due'];
                $total_products=$row_data['total_products'];
                $invoice_no=$row_data['invoice_no'];
                $order_status=$row_data['o_status'];
                if($order_status=='Pending')
                {
                    $order_status='Incomplete';
                }
                else
                {
                    $order_status='Complete';
                }
                $order_date=$row_data['o_date'];
                
                echo "<tr>
                <td class='bg-success text-light'>$sr_no</td>
                <td class='bg-success text-light'>$amt_due</td>
                <td class='bg-success text-light'>$total_products</td>
                <td class='bg-success text-light'>$invoice_no</td>
                <td class='bg-success text-light'>$order_date</td>
                <td class='bg-success text-light'>$order_status</td>";
                ?>
                <?php
                if($order_status=='Complete')
                {
                    echo "<td class='bg-success text-light'>Paid</td>";
                }
                else
                {
                    echo "<td class='bg-success text-light'><a href='confirm_payment.php?order_id=$order_id' class='text-light text-decoration-none'>Confirm</a></td>
                    </tr>";
                }
                
            $sr_no++;
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>
