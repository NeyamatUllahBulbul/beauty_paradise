<!-- edit-category.php -->
<!-- category-add.php -->
<?php include 'include/header.php'; 

if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}
include('include/config.php');
error_reporting(0);
	if(isset($_POST['update_category']))
	{
		$catid=intval($_GET['cid']);
		$category=$_POST['name'];
		$description=$_POST['description'];
		$query=mysqli_query($con,"Update  tblcategory set CategoryName='$category',Description='$description' where id='$catid'");
		if($query)
		{
		$msg="Category Updated successfully ";
		}
		else{
		$error="Something went wrong . Please try again.";    
		} 
	}
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Category Edit | Admin</title>
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
						<h2>Category Add</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Category</span></li>
								<li><span>add</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<?php if($msg){ ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<strong>Well done!</strong> <?php echo htmlentities($msg);?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($error){ ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="row">
						<div class="col-md-12">
							<?php 
$catid=intval($_GET['cid']);
$query=mysqli_query($con,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=1 and id='$catid'");
while($row=mysqli_fetch_array($query))
{
?>
							<form id="form1" action="" method="POST" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Category Add Form</h2>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-2 control-label">Category Name: </label>
											<div class="col-sm-8">
												<input type="text" name="name" class="form-control" value="<?php echo htmlentities($row['CategoryName']);?>" required="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Category Description: </label>
											<div class="col-sm-8">
												<input type="text" name="description" value="<?php echo htmlentities($row['Description']);?>" class="form-control">
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<input type="submit" name="update_category" class="btn btn-primary" value="Update Category">
									</footer>
								</section>
							</form>
<?php } ?>
						</div>
					</div>
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
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>