<!-- checkout.php -->
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
    <title>BEAUTY PARADISE - Checkout</title>

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
                        <h2>Checkout</h2>
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
            	<?php if(!empty($_SESSION["shopping_cart"])){  ?>
            	<form action="manage-insert.php" method="POST">	
	            	<div class="col-12 col-md-12">
	                    <div class="checkout_details_area mt-50 clearfix">

	                        <div class="cart-page-heading mb-30">
	                            <h5>Cart Products</h5>
	                        </div>
	                        <table class="timetable_sub">
	                       		<thead>
	                          		<tr>
		                                <th>SL No.</th>
		                                <th>Product</th>
		                                <th>Quality</th>
		                                <th>Product Name</th>
		                                <th>Price</th>
		                                <th>Remove</th>
	                          		</tr>
	                       		</thead>
	                           	<tbody>
	                           		<?php 
	                    			if(!empty($_SESSION["shopping_cart"])){
	                    				$total = 0;
	                    				$count = 1;  
			                            foreach($_SESSION["shopping_cart"] as $keys => $values){
			                            	$p_id =  $values["item_id"];
			                            	$SQL = "SELECT * FROM tblproducts WHERE id= '$p_id'";
			                            	$result = $con->query($SQL);
	                    			?>
	                              	<tr class="rem1">
	                              		<?php foreach ($result as $r) { 
	                              			$total = $total + $r['price'];
	                              		?>
	                                 	<td class="invert"><?php echo $count; ?></td>
	                                 	<td class="invert-image"><a href="#"><img style="height: 122px;width: 143px;" src="Admin/productimages/<?php echo $r['PostImage']; ?>"  class="img-responsive"></a></td>
	                                 	<td class="invert">
	                                    	<div class="quantity">
	                                       		<div class="quantity-select">
		                                          	<input type="number" name="qty[]" value="1" min="1">
	                                       		</div>
	                                    	</div>
	                                 	</td>
	                                 	<td class="invert"><?php echo $r['ProductTitle']; ?></td>
	                                 	<td class="invert">৳<?php echo $r['price']; ?> </td>
	                                 	<td class="invert">
		                                    <div class="rem">
		                                       <a class="text-danger" href="checkout.php?action=delete&id=<?php echo $values["item_id"]; ?>">Remove</a>
		                                    </div>
	                                 	</td>
	                                 	<input type="hidden" name="p_id[]" value="<?php echo $r['id']; ?>">
	                                 	<input type="hidden" name="uprice[]" value="<?php echo $r['price']; ?>">
	                                 	<?php } ?>
	                              	</tr>
	                              	<?php $count++; } } ?>
	                              	<tr>
	                              		<td></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td>Total Price</td>
	                              		<td>৳ <?php echo $total; ?></td>
	                              		<td></td>
	                              	</tr>
	                           	</tbody>
	                    	</table>
	                    </div>
	                </div>
	                <div class="col-12 col-md-12">
	                    <div class="checkout_details_area mt-50 clearfix">

	                        <div class="cart-page-heading mb-30">
	                            <h5>Billing Address</h5>
	                        </div>

	                        <div class="row">
	                            <div class="col-md-6 mb-3">
	                                <label for="first_name">recipient Name <span>*</span></label>
	                                <input type="text" class="form-control" name="name" required>
	                            </div>
	                            <div class="col-md-6 mb-3">
	                                <label for="last_name">recipient Phone <span>*</span></label>
	                                <input type="text" class="form-control" name="phone" required>
	                            </div>
	                            <div class="col-12 mb-3">
	                                <label for="street_address">recipient Address <span>*</span></label>
	                                <input type="text" class="form-control mb-3" name="address" required="">
	                            </div>
	                            <div class="col-md-6 mb-3">
	                                <label for="first_name">delivery time <span>*</span></label>
	                                <input type="text" class="form-control" name="deliverytime" required>
	                            </div>
	                            <div class="col-md-6 mb-3">
	                                <label for="">payment method <span>*</span></label><br>
	                                <select  name="paymentMethod" required>
	                                	<option>-- Select --</option>
	                                	<option value="Cash On Delivery">Cash On Delivery</option>
	                                	<option value="Card">Card</option>
	                                </select>
	                            </div>
	                        </div>
	                        <input type="submit" name="order" class="btn essence-btn" value="Place Order">
	                    </div>
	                </div>
	            </form>
            	<?php }else{ ?>
            	<div class="col-12 col-md-12 text-center">
            		<p>Cart is empty! For shoping <a href="shop.php">Click</a> here.</p>
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

    <script type="text/javascript">
    	$(document).ready(function() {

    	});
    </script>

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