<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Sr No.</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="select * from `categories`";
        $result_query=mysqli_query($con,$select_cat);
        $no=0;
        while($row_fetch=mysqli_fetch_assoc($result_query))
        {
            $cat_id=$row_fetch['cat_id'];
            $cat_title=$row_fetch['cat_title'];
            $no++;
        ?>
        <tr class="text-center">
            <td><?php echo $no; ?></td>
            <td><?php echo $cat_title; ?></td>
            <td><a href='index.php?edit_cat=<?php echo $cat_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?del_cat=<?php echo $cat_id; ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></a></td>
        </tr>
            <?php } ?>
    </tbody>
</table>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want to delete this ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_cat" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?del_cat=<?php echo $cat_id; ?>" type="button" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>