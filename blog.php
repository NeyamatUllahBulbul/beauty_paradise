<!-- blog.php -->
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
    <title>BEAUTY PARADISE - Blog</title>

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
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">

            	<div class="col-12 col-lg-12" style="padding-bottom: 80px;">
                    <div class="checkout_details_area clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Write A Post</h5>
                        </div>

                        <form action="manage-insert.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                            	<div class="col-12 mb-4">
                                    <label for="email_address">Post Title <span>*</span></label>
                                    <input type="text" name="title" class="form-control" id="email_address" required="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Post Description <span>*</span></label>
                                    <textarea class="form-control" name="description" rows="4" style="height: auto;"></textarea>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Post Image <span>*</span></label>
                                    <input type="file" name="postimage" class="form-control" required="">
                                </div>
                            </div>
                            <input type="submit" name="post" class="btn essence-btn" value="Post">
                        </form>
                    </div>
                </div>
               
                <!-- Single Blog Area -->
                <?php 
                	$query1="SELECT * FROM `tblpost` WHERE status = 1;";
                    $result1 = $con->query($query1);
                    foreach ($result1 as $r1) {
                ?>
                <div class="col-12 col-lg-6">
                    <div class="single-blog-area mb-50">
                        <img style="height: 289px; width: 540px;" src="postimages/<?php echo $r1['image']; ?>" alt="">
                        <!-- Post Title -->
                        <div class="post-title">
                            <a href="single-blog.php?post_id=<?php echo $r1['id']; ?>"><?php echo $r1['postTitle']; ?></a>
                        </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <!-- Post Title -->
                            <div class="hover-post-title">
                                <a href="single-blog.php?post_id=<?php echo $r1['id']; ?>"><?php echo $r1['postTitle']; ?></a>
                            </div>
                            <p><?= substr($r1['postDetails'], 0, 120) . '...'; ?></p>
                            <a href="single-blog.php?post_id=<?php echo $r1['id']; ?>">Continue reading <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            	<?php } ?>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->

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