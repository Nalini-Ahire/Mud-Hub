<?php



//getting products
function get_products()
{
    global $con;

    //condition to check isset or not
    if(!isset($_GET['category']))
    {
        
    
    
    //fetching products
    $select_query="select * from products order by rand() limit 0,2";
    $result_query=mysqli_query($con,$select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['p_title'];
    while($row=mysqli_fetch_assoc($result_query))
    {
                $product_id=$row['p_id'];
                $product_title=$row['p_title'];
                $product_des=$row['p_des'];
                $product_img1=$row['p_img1'];
                $product_img2=$row['p_img2'];
                $product_img3=$row['p_img3'];
                $product_price=$row['p_price'];
                $category_id=$row['cat_id'];
                echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img2' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img3' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              
    }
    }
}

//get all products

function get_all_products()
{
    global $con;

    //condition to check isset or not
    if(!isset($_GET['category']))
    {
        
    
    
    //fetching products
    $select_query="select * from products order by rand()";
    $result_query=mysqli_query($con,$select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['p_title'];
    while($row=mysqli_fetch_assoc($result_query))
    {
                $product_id=$row['p_id'];
                $product_title=$row['p_title'];
                $product_des=$row['p_des'];
                $product_img1=$row['p_img1'];
                $product_img2=$row['p_img2'];
                $product_img3=$row['p_img3'];
                $product_price=$row['p_price'];
                $category_id=$row['cat_id'];
                echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img2' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img3' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              
              }
    
}
}

//getting unique category
function get_unique_cat()
{
    global $con;

    //condition to check isset or not
    if(isset($_GET['category']))
    {
        $category_id=$_GET['category'];
    //fetching products
    $select_query="select * from products where cat_id=$category_id order by rand()";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows == 0)
    {
        echo "<h2 class='text-center text-danger'>No Stock for this category !!!</h2>";
    }
    
    while($row=mysqli_fetch_assoc($result_query))
    {
        $product_id=$row['p_id'];
        $product_title=$row['p_title'];
                $product_des=$row['p_des'];
                $product_img1=$row['p_img1'];
                $product_img2=$row['p_img2'];
                $product_img3=$row['p_img3'];
                $product_price=$row['p_price'];
                $category_id=$row['cat_id'];
                echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img2' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img3' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              
    }
    
}
}



function get_cat()
{
    global $con;
    $select_cat="select * from categories ";
    $result_cat=mysqli_query($con,$select_cat);
    while($row_data=mysqli_fetch_assoc($result_cat))
    {
        $cat_title=$row_data['cat_title'];
        $cat_id=$row_data['cat_id'];
        echo "<li class='nav-item'><a href='index.php?category=$cat_id' class='nav-link text-light'><h5>$cat_title</h5></a></li>";
    }
}

function get_search_products()
{
    global $con;
    if(isset($_GET['search_data_product']))
    {
        $search_data_value=$_GET['search_data'];
    
    
    //searching products
    $search_query="select * from products where p_keyword like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows == 0)
    {
        echo "<h2 class='text-center text-danger'>No Results match !!!</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query))
    {
        $product_id=$row['p_id'];
        $product_title=$row['p_title'];
                $product_des=$row['p_des'];
                $product_img1=$row['p_img1'];
                $product_img2=$row['p_img2'];
                $product_img3=$row['p_img3'];
                $product_price=$row['p_price'];
                $category_id=$row['cat_id'];
                echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img2' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img3' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
                </div>
              </div>";

              
    }
}
}  

//view details
function view_details()
{
    global $con;

    if(isset($_GET['product_id']))
    {
    //condition to check isset or not
    if(!isset($_GET['category']))
    {
        
    $product_id=$_GET['product_id'];
    
    //fetching products
    $select_query="select * from products where p_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['p_title'];
    while($row=mysqli_fetch_assoc($result_query))
    {
                $product_id=$row['p_id'];
                $product_title=$row['p_title'];
                $product_des=$row['p_des'];
                $product_img1=$row['p_img1'];
                $product_img2=$row['p_img2'];
                $product_img3=$row['p_img3'];
                $product_price=$row['p_price'];
                $category_id=$row['cat_id'];
                echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_des</p>
                    <p class='card-text'>Price : Rs.$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='index.php' class='btn btn-secondary'>Go Home</a>
                  </div>
                </div>
              </div>
              
              <div class='col-md-8'>
        <!-- related images -->
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center text-info mb-5'>Related Products</h4>
            </div>
            <div class='col-md-6'>
                <img src='./admin/product_images/$product_img2' class='card-img-top' alt='$product_title'>
            </div>
            <div class='col-md-6'>
            <img src='./admin/product_images/$product_img3' class='card-img-top' alt='$product_title'>
            </div>
        </div>
    </div>";

              
    }
    }  
}
}


//getting ip address function
function get_ip_address() 
{  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) 
     {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
     }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
    {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    //whether ip is from the remote address  
    else
    {  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = get_ip_address();  
// echo 'User Real IP Address - '.$ip;  


//cart function
function get_cart()
{
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $get_ip_adr = get_ip_address(); 
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from cart_details where ip_adr='$get_ip_adr' and p_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows > 0)
        {
            echo "<script>alert('Item is already present in the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else
        {
            $insert_query="insert into cart_details (p_id,ip_adr,quan) values ($get_product_id,'$get_ip_adr',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

//getting cart items number
function cart_item()
{
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $get_ip_adr = get_ip_address(); 
        
        $select_query="select * from cart_details where ip_adr='$get_ip_adr'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
        else
        {
            global $con;
        $get_ip_adr = get_ip_address(); 
        
        $select_query="select * from cart_details where ip_adr='$get_ip_adr'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
}


//total price function
function total_cart_price()
{
    global $con;
    $get_ip_adr = get_ip_address(); 
    $total_price=0;
    $cart_query="select * from cart_details where ip_adr='$get_ip_adr'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result))
    {
        $product_id=$row['p_id'];
        $select_products="select * from products where p_id=$product_id";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products))
        {
            $product_price=array($row_product_price['p_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }
    }
    echo $total_price;
}


//get user order details
function get_order_details()
{
   global $con;
   $username=$_SESSION['username'];
   $details_query="select * from `user` where u_name='$username'";
   $run_details_query=mysqli_query($con,$details_query);
   while($row_query=mysqli_fetch_array($run_details_query))
   {
    $user_id=$row_query['u_id'];
    if(!isset($_GET['edit_acc']))
    {
        if(!isset($_GET['my_order']))
        {
            if(!isset($_GET['del_acc']))
            {
                $get_order="select * from `order` where u_id=$user_id and o_status='pending'";
                $result_order=mysqli_query($con,$get_order);
                $row_cnt=mysqli_num_rows($result_order);
                if($row_cnt > 0)
                {
                    echo "<h3 class='text-center text-success mt-5 mb-2s'>You have <span class='text-danger'>$row_cnt</span> pending orders !!</h3>";
                    echo "<p class='text-center'><a href='profile.php?my_order' class='text-dark text-decoration-none'>Order Details</a></p>";
                }
                else
                {
                    echo "<h3 class='text-center text-success mt-5 mb-2s'>You have <span class='text-danger'>0 </span> pending orders !!</h3>";
                    echo "<p class='text-center'><a href='../index.php' class='text-dark text-decoration-none'>Explore Products</a></p>";
                }
            }
        }
    }
   }
}
?>