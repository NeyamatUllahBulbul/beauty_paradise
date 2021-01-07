<!-- order-list.php -->
<?php include 'include/header.php'; 

if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}
include('include/config.php');
error_reporting(0);
if( $_GET['disid'])
{
	$id=intval($_GET['disid']);
	$query=mysqli_query($con,"update tblorder set status='1' where id='$id'");
	$msg="Order unapprove ";
}
// Code for restore
if($_GET['appid'])
{
	$id=intval($_GET['appid']);
	$query=mysqli_query($con,"update tblorder set status='0' where id='$id'");
	$msg="Order approved";
}
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Order List Table | Admin</title>
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

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
						<h2>Order List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Order</span></li>
								<li><span>List</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<?php if($msg){ ?>
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<strong>Well Done!</strong> <?php echo htmlentities($msg);?>
								</div>
							</div>
						</div>
						<?php } ?>
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Order List</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>Order No.</th>
											<th>Customer</th>
											<th>Address</th>
											<th>Phone</th>
											<th>Order Date</th>
											<th>Total</th>
											<th class="hidden-phone">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
$query=mysqli_query($con,"SELECT `id`, `order_number`, `order_date`, `order_time`,`phone`, `address`, `total`, `user_id`, `status`,(select name from users where users.id = tblorder.user_id)as username FROM `tblorder`");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
									
										<tr class="gradeX">
											<td><?php echo htmlentities($row['order_number']);?></td>
											<td><?php echo htmlentities($row['username']);?></td>
											<td><?php echo htmlentities($row['address']);?></td>
											<td><?php echo htmlentities($row['phone']);?></td>
											<td><?php echo htmlentities($row['order_date']);?></td>
											<td><?php echo htmlentities($row['total']);?></td>
											<td class="center hidden-phone">
												<?php if($row['status']=='0'):?>

												    <a class="btn btn-danger" href="order-list.php?disid=<?php echo htmlentities($row['id']);?>" title="Disaprove this pets"><i class="fa fa-minus-square" title="Disaprove"></i> Disaprove</a>
												    <a class="btn btn-info" href="invoice.php?orderno=<?php echo htmlentities($row['order_number']);?>" title="Disaprove this pets"><i class="fa fa-eye" title="View"></i> View</a>
												<?php else :?>
												  <a class="btn btn-success" href="order-list.php?appid=<?php echo htmlentities($row['id']);?>" title="Approve this pets"><i class="fa fa-check-square" title="Approve"></i> Aprove</a> 
												  <a class="btn btn-info" href="invoice.php?orderno=<?php echo htmlentities($row['order_number']);?>" title="View"><i class="fa fa-eye" title="Restore this category"></i> View</a>
												<?php endif;?>
											</td>
										</tr>
										<?php
										$cnt++;
										 } ?>
									</tbody>
								</table>
							</div>
						</section>
						
					<!-- end: page -->
				</section>
			</div>
			
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
	</body>
</html>