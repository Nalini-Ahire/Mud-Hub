<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_product="select * from `products` ";
        $result=mysqli_query($con,$get_product);
        $num=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $product_id=$row['p_id'];
            $product_title=$row['p_title'];
            $product_img1=$row['p_img1'];
            $product_img2=$row['p_img2'];
            $product_img3=$row['p_img3'];
            $product_price=$row['p_price'];
            $status=$row['status'];
            $num++;
            ?>
            <tr class='text-center'>
            <td><?php echo $num ; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./product_images/<?php echo $product_img1; ?> 'class='product_img'></td>
            <td><?php echo $product_price;?> /-</td>
            <td><?php
            $get_cnt="select * from `pending_order` where p_id=$product_id";
            $result_cnt=mysqli_query($con,$get_cnt);
            $row_cnt=mysqli_num_rows($result_cnt);
            echo $row_cnt;
            ?></td>
            <td><?php echo $status; ?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?del_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></a></td>
            </tr>

            <tr class='text-center'>
            <td><?php echo $num ; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./product_images/<?php echo $product_img2; ?> 'class='product_img'></td>
            <td><?php echo $product_price;?> /-</td>
            <td><?php
            $get_cnt="select * from `pending_order` where p_id=$product_id";
            $result_cnt=mysqli_query($con,$get_cnt);
            $row_cnt=mysqli_num_rows($result_cnt);
            echo $row_cnt;
            ?></td>
            <td><?php echo $status; ?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?del_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></a></td>
            </tr>

            <tr class='text-center'>
            <td><?php echo $num ; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./product_images/<?php echo $product_img3; ?> 'class='product_img'></td>
            <td><?php echo $product_price;?> /-</td>
            <td><?php
            $get_cnt="select * from `pending_order` where p_id=$product_id";
            $result_cnt=mysqli_query($con,$get_cnt);
            $row_cnt=mysqli_num_rows($result_cnt);
            echo $row_cnt;
            ?></td>
            <td><?php echo $status; ?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?del_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></a></td>
            </tr>
            <?php
        }
        ?>
        
    </tbody>
</table>
