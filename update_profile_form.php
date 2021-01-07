<?php include 'include/header.php';

    if (!isset($_SESSION['isLoggedIn'])) {
        echo '<script>window.location="login.php"</script>';
    }

    $uid=intval($_SESSION['id']);
    include('include/config.php');
    if(isset($_POST['update_profile'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $query=mysqli_query($con,"Update users set name='$name', email='$email', phone='$phone', address='$address' where id='$uid'");
        if($query)
        {
            $msg="Profile Updated successfully ";
        }
        else{
            $error="Something went wrong . Please try again.";
        }
    }
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
<?php if(isset($msg)){ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong> <?php echo htmlentities($msg);?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if(isset($error)){ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
        </div>
    </div>
    </div>
<?php } ?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Update Profile</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<?php
    $query=mysqli_query($con,"Select * from  users where Is_Active=1 and id='$uid'");
    while($row=mysqli_fetch_array($query)){

?>
<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-3 col-md-3"></div>
            <div class="col-12 col-md-6">
                <div class="checkout_details_area clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Update Profile</h5>
                    </div>

                    <form id="form_pu" action="" method="post">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label for="email_address">Full Name </label>
                                <input type="text" name="name" value="<?php echo htmlentities($row['name']);?>" class="form-control" id="email_address" required="">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address </label>
                                <input type="email" name="email" value="<?php echo htmlentities($row['email']);?>" class="form-control" id="email_address" required="">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Phone Number </label>
                                <input type="text" name="phone" value="<?php echo htmlentities($row['phone']);?>" class="form-control" id="email_address" required="">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Your Address </label>
                                <input type="text" name="address" value="<?php echo htmlentities($row['address']);?>" class="form-control" id="email_address" required="">
                            </div>
                        </div>
                        <input type="submit" name="update_profile" class="btn essence-btn" value="Update Profile">
                    </form>
    <?php } ?>
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