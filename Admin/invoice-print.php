<!-- invoice-print.php -->
<?php include('include/config.php');  ?>
<html>
	<head>
		<title>Porto Admin - Invoice Print</title>
		<!-- Web Fonts  -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<!-- Invoice Print Style -->
		<link rel="stylesheet" href="assets/stylesheets/invoice-print.css" />
	</head>
	<body>
		<div class="invoice">
			<header class="clearfix">
				<div class="row">
					<div class="col-sm-6 mt-md">
						<h2 class="h2 mt-none mb-sm text-dark text-bold">INVOICE</h2>
						<h4 class="h4 m-none text-dark text-bold">#<?= $_GET['orderno']; ?></h4>
					</div>
					<div class="col-sm-6 text-right mt-md mb-md">
						<address class="ib mr-xlg">
							GYM Equipment
							<br/>
							24/a Dhanmodi, Dhaka
							<br/>
							Phone: +12 3 4567-8901
							<br/>
							gymequipment@gmail.com
						</address>
						<div class="ib">
							<img src="assets/images/invoice-logo.png" alt="OKLER Themes" />
						</div>
					</div>
				</div>
			</header>
			<div class="bill-info">
				<div class="row">
					<?php 
                    	$order_id = $_GET['orderno'];
                    	$sql = "SELECT o.order_date,o.order_time,o.name,u.email,o.phone,o.address
						FROM tblorder AS o,users as u 
						WHERE o.user_id = u.id
						AND order_number = '$order_id';";
						$result = $con->query($sql);
  						foreach ($result as $r) { 
                    ?>
					<div class="col-md-6">
						<div class="bill-to">
							<p class="h5 mb-xs text-dark text-semibold">To:</p>
							<address>
								<?php echo $r['name']; ?>
								<br/>
								<?php echo $r['address']; ?>
								<br/>
								Phone: <?php echo $r['phone']; ?>
								<br/>
								<?php echo $r['email']; ?>
							</address>
						</div>
					</div>
					<div class="col-md-6">
						<div class="bill-data text-right">
							<p class="mb-none">
								<span class="text-dark">Invoice Date:</span>
								<span class="value"><?php echo $r['order_date']; ?></span>
							</p>
							<p class="mb-none">
								<span class="text-dark">Invoice Time:</span>
								<span class="value"><?php echo $r['order_time']; ?></span>
							</p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		
			<div class="table-responsive">
				<table class="table invoice-items">
					<thead>
						<tr class="h4 text-dark">
							<th id="cell-id"     class="text-semibold">#</th>
							<th id="cell-item"   class="text-semibold">Item</th>
							<th id="cell-desc"   class="text-semibold">Item Category</th>
							<th id="cell-price"  class="text-center text-semibold">Price</th>
							<th id="cell-qty"    class="text-center text-semibold">Quantity</th>
							<th id="cell-total"  class="text-center text-semibold">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                    		$grandTotal = 0;
                    		$count = 1;
                    		$sql2= "SELECT od.order_number,od.p_id,od.unit_price,od.quantity,p.ProductTitle,c.CategoryName FROM tblorderdetails as od,tblproducts as p,tblcategory as c WHERE od.p_id = p.id And p.CategoryId = c.id
                    		AND od.order_number = '$order_id';";
                    		$result2 = $con->query($sql2);
								foreach ($result2 as $r2) {
									$grandTotal =$grandTotal + $r2['unit_price'];
                    	?>
						<tr>
							<td><?= $count; ?></td>
							<td class="text-semibold text-dark"><?= $r2['ProductTitle']; ?></td>
							<td><?= $r2['CategoryName']; ?></td>
							<td class="text-center">৳<?= $r2['unit_price']; ?></td>
							<td class="text-center"><?= $r2['quantity']; ?></td>
							<td class="text-center">৳<?= $r2['unit_price'] * $r2['quantity']; ?></td>
						</tr>
						<?php $count++; } ?>
					</tbody>
				</table>
			</div>
		
			<div class="invoice-summary">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-8">
						<table class="table h5 text-dark">
							<tbody>
								<tr class="h4">
									<td colspan="2">Grand Total</td>
									<td class="text-left">৳<?= $grandTotal; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<script>
			window.print();
		</script>
	</body>
</html>