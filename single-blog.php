<!-- single-blog.php -->
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
    <title>BEAUTY PARADISE - Single Blog</title>

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
    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="single-blog-wrapper">
    	<?php 
			$post_id = $_GET['post_id'];
	        $query="SELECT `id`, `user_id`, `postDate`, `postTime`, `image`, `postTitle`, `postDetails`, `status`,(select name from users WHERE users.id = tblpost.user_id) as username FROM `tblpost` WHERE id= '$post_id';";
	        $result = $con->query($query);
	     ?>
        <!-- Single Blog Post Thumb -->
        <div class="single-blog-post-thumb">
        	<?php foreach ($result as $r) { ?>
            <img style="height: 412px;width: 1583px;" src="postimages/<?php echo $r['image']; ?>" alt="">
        	<?php } ?>
        </div>

        <!-- Single Blog Content Wrap -->
        <div class="single-blog-content-wrapper d-flex">
            <!-- Blog Content -->
            <?php foreach ($result as $r) { ?>
            <div class="single-blog--text">
                <h2 style="margin-bottom: 10px;"><?php echo $r['postTitle']; ?></h2>
                <div class="row" style="padding-bottom: 2em;">
                	<div class="col-md-6">
                		<div class="user-login-info">
                			<a href="#" style="color: #FF084E;"> <img style="height: 10px;width: 10px;" src="img/core-img/user.svg" alt=""> <?php echo $r['username']; ?></a><br>
                			<small style="color: #0315FF;"><?php echo $r['postDate']; ?> , <?php echo $r['postTime']; ?></small>
                		</div>
                	</div>
                </div>
                <p><?php echo $r['postDetails']; ?></p>
                <?php
                	$totalComment = 0;
       				$query1="SELECT `id`, `postId`, `user_id`, `comment`, `date`, `time`,(select name from users WHERE users.id = tblcomments.user_id) as username FROM `tblcomments` WHERE postId= '$post_id';";
                    $result1 = $con->query($query1);
                    foreach ($result1 as $r1) {
                    	$totalComment++;
                    }
                ?>
                <div class="cart-page-heading mb-30">
                    <h5>Comments (<?= $totalComment; ?>)</h5>
                </div>
                <?php foreach ($result1 as $r2) { 
                	$comment_id = $r2['id'];
                ?>
                <div class="row">
                	<div class="col-md-2"></div>
                	<div class="col-md-10">
                		<div class="user-login-info">
                			<a href="#"><img style="height: 20px;width: 20px;" src="img/core-img/user.svg" alt=""> <?php echo $r2['username']; ?> </a><br>
                			<small><?php echo $r2['date']; ?> , <?php echo $r2['time']; ?></small>
                		</div>
                		<p><?php echo $r2['comment']; ?></p>
                		<div class="row">
                			<?php 
                			$query2="SELECT `id`, `comment_id`, `user_id`, `replay`, `date`, `time`,(select name from users WHERE users.id = tblreplay.user_id) as username FROM `tblreplay` WHERE comment_id= '$comment_id';";
                    		$result2 = $con->query($query2);
                    		foreach ($result2 as $r3) {	
                			?>
                			<div class="col-md-2"></div>
		                	<div class="col-md-10">
		                		<div class="user-login-info">
		                			<a href="#"><img style="height: 20px;width: 20px;" src="img/core-img/user.svg" alt=""> <?php echo $r3['username']; ?> </a><br>
		                			<small><?php echo $r3['date']; ?> , <?php echo $r3['time']; ?></small>
		                		</div>
		                		<p><?php echo $r3['replay']; ?></p>
		                	</div>
		                	<?php } ?>
		                	<div class="col-md-2"></div>
		                	<div class="col-md-10">
		                		<form action="manage-insert.php" method="post">
				                    <div class="row">
				                        <div class="col-12 mb-4">
				                            <textarea class="form-control" name="replayText" rows="1" style="height: auto;" placeholder="Write a replay....."></textarea>
				                        </div>
				                    </div>
				                    <input type="hidden" name="post_id" value="<?= $post_id; ?>">
				                    <input type="hidden" name="comment_id" value="<?= $comment_id; ?>">
				                    <input type="submit" name="replay" class="btn essence-btn" value="Replay">
				                </form>
		                	</div>
                		</div>
                	</div>
                </div>
            	<?php } ?>
                <form action="manage-insert.php" method="post">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label for="email_address">Leave Your Comment</label>
                            <textarea class="form-control" name="commentText" rows="2" style="height: auto;" placeholder="Write a comment...."></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="post_id" value="<?= $post_id; ?>">
                    <input type="submit" name="comment" class="btn essence-btn" value="Comment">
                </form>
            </div>
        	<?php } ?>

            <div class="related-blog-post">
                <!-- Single Related Blog Post -->
                <?php 
                	$query4="SELECT * FROM `tblpost` WHERE status = 1;";
                    $result4 = $con->query($query4);
                    foreach ($result4 as $r4) {
                ?>
                <div class="single-related-blog-post">
                    <img style="height: 237px;width: 396px;" src="postimages/<?php echo $r4['image']; ?>" alt=""> 
                    <a href="single-blog.php?post_id=<?php echo $r4['id']; ?>">
                        <h5><?php echo $r4['postTitle']; ?></h5>
                    </a>
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