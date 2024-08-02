<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
        $get_order="select * from `order` ";
        $result=mysqli_query($con,$get_order);
        $row_cnt=mysqli_num_rows($result);
        
        if($row_cnt == 0)
        {
            echo "<h2 class='text-danger text-center mt-5'>No Orders yet !!</h2>";
        }
        else
        {
            echo "<tr>
        <th>Sr No.</th>
        <th>Amount Due</th>
        <th>Invoice No.</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody class='bg-secondary text-light text-center'>";
            $num=0;
            while($row_fetch=mysqli_fetch_assoc($result))
            {
                $o_id=$row_fetch['o_id'];
                $user_id=$row_fetch['u_id'];
                $amt_due=$row_fetch['amt_due'];
                $invoice_no=$row_fetch['invoice_no'];
                $total_products=$row_fetch['total_products'];
                $o_date=$row_fetch['o_date'];
                $o_status=$row_fetch['o_status'];
                $num++;
                ?>

                <tr class="text-center">
            <td><?php echo $num; ?></td>
            <td><?php echo $amt_due; ?></td>
            <td><?php echo $invoice_no; ?></td>
            <td><?php echo $total_products; ?></td>
            <td><?php echo $o_date; ?></td>
            <td><?php echo $o_status; ?></td>
            <td><a href='index.php?del_order=<?php echo $o_id; ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></a></td>
        </tr>
            <?php }} ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want to delete this ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?del_order" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?del_order=<?php echo $o_id; ?>" type="button" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>