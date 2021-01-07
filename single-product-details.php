<!-- single-product-details.php -->
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
     <title>BEAUTY PARADISE - Product Details</title>

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
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Product Single</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
		$p_id = $_GET['p_id'];
		$query="SELECT p.id, p.ProductTitle, p.CategoryId,p.PostImage,p.Details, p.price,p.Is_Active, c.CategoryName FROM tblcategory as c,tblproducts as P WHERE c.id = p.CategoryId AND p.id = '$p_id' ;";
		$result = $con->query($query);
		foreach ($result as $r) {
	?>
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center section-padding-80">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img style="height: 769px; width: 792px;" src="Admin/productimages/<?php echo $r['PostImage']; ?>" alt="">
                <img style="height: 769px; width: 792px;" src="Admin/productimages/<?php echo $r['PostImage']; ?>" alt="">
                <img style="height: 769px; width: 792px;" src="Admin/productimages/<?php echo $r['PostImage']; ?>" alt="">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span><?php echo $r['CategoryName']; ?></span>
            <a href="#">
                <h2><?php echo $r['ProductTitle']; ?></h2>
            </a>
            <p class="product-price">৳ <?php echo $r['price']; ?></p>
            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                     <a href="cart.php?p_id=<?php echo $r['id'];?>&&page=shop" class="btn essence-btn">Add to Cart</a>
                </div>
            </form>
            <div class="" style="margin-top: 1em;">
            	<?php echo $r['Details']; ?>
            </div>
        </div>
    </section>
	<?php } ?>
    <!-- ##### Single Product Details Area End ##### -->

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