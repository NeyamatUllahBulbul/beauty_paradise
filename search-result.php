<!-- search-result.php -->
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
    <title>BEAUTY PARADISE - Search</title>

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
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Search Result</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <?PHP
                $totalProduct = 0;
                $checkresult = '';
                if (isset($_POST['search'])) {
                   $search = $_POST['search'];
                   $query3="SELECT p.id, p.ProductTitle, p.CategoryId,p.PostImage, p.price,p.Is_Active, c.CategoryName FROM tblcategory as c,tblproducts as P WHERE c.id = p.CategoryId AND p.Is_Active = 1 AND p.ProductTitle LIKE '%".$search."%';";
                $checkresult = $con->query($query3);
                }else if ($checkresult->num_rows < 1) {
                    $query3="SELECT p.id, p.ProductTitle, p.CategoryId,p.PostImage, p.price,p.Is_Active, c.CategoryName FROM tblcategory as c,tblproducts as P WHERE c.id = p.CategoryId AND p.Is_Active = 1 AND c.CategoryName LIKE '%".$search."%';";
                }else{
                   $query3="SELECT p.id, p.ProductTitle, p.CategoryId,p.PostImage, p.price,p.Is_Active, c.CategoryName FROM tblcategory as c,tblproducts as P WHERE c.id = p.CategoryId  AND p.Is_Active = 1;";
                }
                $result3 = $con->query($query3);
                foreach ($result3 as $r3) {
                	$totalProduct++;
                }
                ?>
                <div class="col-12 col-md-8 col-lg-12">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span><?php echo $totalProduct; ?></span> products found</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Single Product -->
                            <?php foreach ($result3 as $r3) { ?>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img style="height: 348px; width: 255px;" src="Admin/productimages/<?php echo $r3['PostImage']; ?>" alt="">
		                                <!-- Hover Thumb -->
		                                <img class="hover-img" style="height: 348px; width: 255px;" src="Admin/productimages/<?php echo $r3['PostImage']; ?>" alt="">

                                        <!-- Product Badge -->
                                        <div class="product-badge offer-badge">
                                            <span>new</span>
                                        </div>
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span><?php echo $r3['CategoryName']; ?></span>
                                        <a href="single-product-details.php?p_id=<?php echo $r3['id']; ?>">
                                            <h6><?php echo $r3['ProductTitle']; ?></h6>
                                        </a>
                                        <p class="product-price" style="color: #dc0345;">৳ <?php echo $r3['price']; ?></p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="cart.php?p_id=<?php echo $r3['id'];?>&&page=checkout" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        	<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

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