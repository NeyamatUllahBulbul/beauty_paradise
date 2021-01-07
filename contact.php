<!-- contact.php -->
<?php include 'include/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>BEAUTY PARADISE - Contact Us</title>

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
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- ##### Right Side Cart End ##### -->


    <div class="contact-area d-flex align-items-center">
        <div class="col-md-6 ">
            <div class="container ">
                <div class="row justify-content-center">
                    <form class="" action="contact_action.php" method="POST">

                        <h3>Send us a feedback, suggestion or query</h3><br>
                        <?php
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset ($_SESSION['msg']);
                        }
                        ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name"><b>Name</b></label>
                                <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Enter your full name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"><b>Email</b></label>
                                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter your Email" required>
                            </div>
                        </div>
                        <div class="">
                            <label class="" for="pwd"><b>Write your message</b></label>
                            <div class="">
                                <textarea class="form-control " name="message" id="blogForm"  rows="4" placeholder="Please write your message here."></textarea>
                            </div>
                        </div>
                <br><br>
                <div class="form-row ">
                    <div class="">
                        <button type="submit" class="btn msg btn-primary "><b>Send message </b></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>

        <div class="contact-info col-md-6">
            <h2>How to Find Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eget pharetra turpis, vitae convallis tortor. Maecenas rhoncus sed lacus non aliquet. Curabitur molestie ex magna, et tempus tortor semper ut. Fusce euismod risus leo, a rhoncus ligula laoreet ut.</p>

            <div class="contact-address mt-50">
                <p><span>address:</span> 65/C Mohakhali, Dhaka-1217</p>
                <p><span>telephone:</span> +8801569452158</p>
                <p><a href="mailto:beautyparadise@gmail.com">beautyparadise@gmail.com</a></p>
            </div>
        </div>

    </div>
    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand1.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand2.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand3.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand4.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand5.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand6.png" alt="">
        </div>
    </div>
    <!-- ##### Brands Area End ##### -->

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
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/map-active.js"></script>

</body>

</html>