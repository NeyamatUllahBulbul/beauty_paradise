<!-- nav-bar.php -->
<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="index.php"><b>BEAUTY PARADISE</b></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                    	<li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form action="search-result.php" method="post">
                    <input type="search" name="search" id="headerSearch" placeholder="Type product name for search">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <!-- User Login Info -->
            <div class="user-login-info">
            <?php if (!isset($_SESSION['isLoggedIn'])) { ?>
                <a href="login.php"><img src="img/core-img/user.svg" alt=""></a>
            <?php }else{ ?>

                <li class="nav-item dropdown">
                    <a style="width: 220px;" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><img src="img/core-img/user.svg" alt=""><?php echo $_SESSION['name']; ?></a>
                    <div class="dropdown-menu">
                        <a style="width: 200px" class="nav-link" href="update_profile_form.php"><i class="fas fa-sign-in-alt"></i>Update profile</a>
                        <a style="width: 200px" class="nav-link" href="logout.php"><i class="fas fa-sign-in-alt"></i>Logout</a>
                    </div>
                </li>

            <?php } ?>    
            </div>
            <!-- Cart Area -->
            <?php 
                $totalItem = 0;
                if(!empty($_SESSION["shopping_cart"])){
                    foreach($_SESSION["shopping_cart"] as $r ){
                        $totalItem ++;
                    }
                }  
              ?>
            <div class="cart-area">
                <a href="checkout.php"><img src="img/core-img/bag.svg" alt=""> <span><?php echo $totalItem; ?></span></a>
            </div>
        </div>

    </div>
</header>