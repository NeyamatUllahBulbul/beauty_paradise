<!-- invoice.php -->
<?php include 'include/header.php'; 

if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}
include('include/config.php'); 
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Invoice | Admin</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include 'include/top-bar.php'; ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include 'include/left-bar.php'; ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Invoice</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Order</span></li>
								<li><span>Invoice</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<section class="panel">
						<div class="panel-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-bold">INVOICE</h2>
											<h4 class="h4 m-none text-dark text-bold">#<?= $_GET['orderno']; ?></h4>
										</div>
										<div class="col-sm-6 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												Beauty Paradise
												<br/>
												65/C Mohakhali, Dhaka
												<br/>
												Phone: +8801569452158
												<br/>
												beautyparadise@gmail.com
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

							<div class="text-right mr-lg">
								<a href="invoice-print.php?orderno=<?= $_GET['orderno']; ?>" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
							</div>
						</div>
					</section>

					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>