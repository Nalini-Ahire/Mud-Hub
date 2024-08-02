<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
        $get_payment="select * from `user` ";
        $result=mysqli_query($con,$get_payment);
        $row_cnt=mysqli_num_rows($result);
        
        if($row_cnt == 0)
        {
            echo "<h2 class='text-danger text-center mt-5'>No users yet!!</h2>";
        }
        else
        {
            echo "<tr>
        <th>Sr No.</th>
        <th>Username</th>
        <th>User email</th>
        <th>User Image</th>
        <th>User Address</th>
        <th>Mobile No.</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody class='bg-secondary text-light text-center'>";
            $num=0;
            while($row_fetch=mysqli_fetch_assoc($result))
            {
                $u_id=$row_fetch['u_id'];
                $u_name=$row_fetch['u_name'];
                $u_email=$row_fetch['u_email'];
                $u_img=$row_fetch['u_img'];
                $u_adr=$row_fetch['u_adr'];
                $u_mob=$row_fetch['u_mob'];
                $num++;
                ?>

                <tr class="text-center">
            <td><?php echo $num; ?></td>
            <td><?php echo $u_name; ?></td>
            <td><?php echo $u_email; ?></td>
            <td><img src='../user/user_images/<?php echo $u_img; ?>' class='product_img' alt='$username'/></td>
            <td><?php echo $u_adr; ?></td>
            <td><?php echo $u_mob; ?></td>
            <td><a href='index.php?del_user=<?php echo $u_id; ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?del_user" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?del_user=<?php echo $u_id; ?>" type="button" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>