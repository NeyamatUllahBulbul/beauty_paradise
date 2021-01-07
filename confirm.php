<!-- confirm.php -->
<?php include 'include/header.php'; 
 include 'include/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>BEAUTY PARADISE - Confirm</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
   <?php include 'include/nav-bar.php'; ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Order Done</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">
            	<?php if(isset($_GET['order_number'])){  ?>
	            	<div class="col-12 col-md-8">
	                    <div class="checkout_details_area clearfix">

	                        <div class="cart-page-heading mb-30">
	                            <h5>Order Products</h5>
	                        </div>
	                        <table class="timetable_sub">
	                       		<thead>
	                          		<tr>
		                                <th>No.</th>
		                                <th>Product</th>
		                                <th>Quality</th>
		                                <th>Product Name</th>
		                                <th>Price</th>
		                                <th>Sub Total</th>
	                          		</tr>
	                       		</thead>
	                           	<tbody>
	                           		<?php 
	                           		$withoutDiscount = 0;
	                           		$discount = 0;
                    				$count = 1;  
	                            	$order_number =  $_GET['order_number'];
	                            	$SQL = "SELECT od.order_number,od.p_id,od.unit_price,od.quantity,p.ProductTitle,P.PostImage FROM tblorderdetails as od, tblproducts as p WHERE od.p_id = p.id AND OD.order_number= '$order_number';";
	                            	$result = $con->query($SQL);
	                            	foreach ($result as $r) {
	                            		$withoutDiscount = $withoutDiscount + ($r['unit_price'] * $r['quantity']);
	                    			?>
	                              	<tr class="rem1">
	                                 	<td class="invert"><?php echo $count; ?></td>
	                                 	<td class="invert-image"><a href="#"><img style="height: 122px;width: 143px;" src="Admin/productimages/<?php echo $r['PostImage']; ?>"  class="img-responsive"></a></td>
	                                 	<td class="invert"><?php echo $r['quantity']; ?></td>
	                                 	<td class="invert"><?php echo $r['ProductTitle']; ?></td>
	                                 	<td class="invert">৳<?php echo $r['unit_price']; ?> </td>
	                                 	<td class="invert">৳<?php echo $r['unit_price'] * $r['quantity']; ?> </td>
	                              	</tr>
	                              	<?php $count++; }  ?>
	                           	</tbody>
	                    	</table>
	                    </div>
	                </div>
            	
	            	<div class="col-12 col-md-6 col-lg-4 ml-lg-auto">
	            		<div class="cart-page-heading mb-30">
	                        <h5>Order Details</h5>
	                    </div>
	                    <div class="order-details-confirmation">

	                        <div class="cart-page-heading">
	                            <h5>Your Order</h5>
	                            <p>The Details</p>
	                        </div>
	                        <?php
	                        $SQL2 = "SELECT * FROM `tblorder` WHERE order_number= '$order_number';";
                        	$result2= $con->query($SQL2);
                        	foreach ($result2 as $r2) { 
                        		$discount = $r2['discount'];
	                        ?>
	                        <ul class="order-details-form mb-4">
	                            <li><span>Order No.</span> <span>#<?php echo $order_number; ?></span></li>
	                            <li><span>Order Date</span> <span><?php echo $r2['order_date']; ?></span></li>
	                            <li><span>Order Time</span> <span><?php echo $r2['order_time']; ?></span></li>
                                <li><span>Delivery Time</span> <span><?php echo $r2['deliverytime']; ?></span></li>
                                <li><span>Payment Method</span> <span><?php echo $r2['paymentMethod']; ?></span></li>
	                            <li><span>Phone</span> <span><?php echo $r2['phone']; ?></span></li>
	                            <li><span>Order Address</span> <span><?php echo $r2['address']; ?></span></li>
	                            <?php if ($discount == 1) { ?>
	                            <li><span>Without Discount</span> <span>৳<?php echo $withoutDiscount ?></span></li>
	                        	<?php } ?>
	                             <li><span>Total</span> <span>৳<?php echo $r2['total']; if ($discount ==1) {
	                            	echo "(After 50% discount)";
	                            } ?></span></li>
	                        </ul>
	                    	<?php } ?>
	                    </div>
	                </div>
	            <?php } ?>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'include/footer.php'; ?>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>
<?php 
	if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="checkout.php"</script>';  
                }  
           }  
      }  
 } 
?>