<!-- signup.php -->
<?php include 'include/header.php'; 
    $_SESSION['dissmg'] = 1;
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
    <title>BEAUTY PARADISE - Sign Up</title>

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
                        <h2>Sign Up</h2>
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
            	<div class="col-3 col-md-3"></div>
                <div class="col-12 col-md-6">
                    <div class="checkout_details_area clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Sign Up</h5>
                        </div>

                        <form action="manage-login.php" method="post">
                            <div class="row">
                            	<div class="col-12 mb-4">
                                    <label for="email_address">Full Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="email_address" required="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="email_address" required="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Phone Number <span>*</span></label>
                                    <input type="text" name="phone" class="form-control" id="email_address" required="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Password <span>*</span></label>
                                    <input type="password" name="password" class="form-control" required="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Your Address <span>*</span></label>
                                    <input type="text" name="address" class="form-control" id="email_address" required="">
                                </div>
                            </div>
                            <input type="submit" name="signup" class="btn essence-btn" value="Sign Up">
                        </form>
                        <div class="text-center">
                        	<label  style="margin-top: 1em;">Already A Member? <a href="login.php" class="text-primary"> Sign In</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?PHP include 'include/footer.php'; ?>
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