<!-- manage-insert.php -->
<?php 
	session_start();
	include 'include/config.php';
	if (isset($_POST['order'])) {
		if (!isset($_SESSION['isLoggedIn'])) {
			echo '<script>alert("You Need Login First")</script>';
			echo '<script>window.location="login.php"</script>';
		}else if (empty($_SESSION["shopping_cart"])) {
		echo '<script>alert("You Need Select Some Product First")</script>';
		echo '<script>window.location="shop.php"</script>';
		}else{
	    	$odinsert = false;
			date_default_timezone_set("Asia/Dhaka");
	        $make_time =date("h:i:sa");
	        $make_date =date("Y-m-d");
			$order_number= uniqid();
			$u_id = $_SESSION['id'];

			$deliverytime = $_POST['deliverytime'];
			$paymentMethod = $_POST['paymentMethod'];
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];

			$total = 0;
			for($q = 0; $q < count($_POST["p_id"]); $q++){
				$quantity = $_POST['qty'][$q];
            	$uprice = $_POST['uprice'][$q];
            	$total = $total + $quantity * $uprice;
			}
			$discount = 0;
			$SQL = "SELECT * FROM tblorder WHERE user_id= '$u_id';";
			$result = $con->query($SQL);
			if ($result->num_rows <= 0) {
				$total = $total * 10/100;
				$discount  = 1;
			}

			$iquery="INSERT INTO `tblorder`(`order_number`, `order_date`, `order_time`, `deliverytime`, `paymentMethod`, `name`, `phone`, `address`, `total`, `user_id`,`discount`) 
			    VALUES ('$order_number','$make_date','$make_time','$deliverytime','$paymentMethod','$name','$phone','$address','$total','$u_id','$discount');";
			if ($con->query($iquery) === TRUE) {
				$odinsert = true;
			}else {
	            echo "Error: " . $iquery . "<br>" . $con->error;
	        }

	        $oodinsert = false;
	        if ($odinsert == true) {
	        	for($q = 0; $q < count($_POST["p_id"]); $q++){
	                $p_id = $_POST['p_id'][$q]; 
	                $unit_price = $_POST['uprice'][$q];
	                $quantity = $_POST['qty'][$q];

	                $ciQuery = "INSERT INTO `tblorderdetails`( `order_number`, `p_id`, `unit_price`, `quantity`) 
	                		VALUES ('$order_number','$p_id','$unit_price','$quantity');";
	                if ($con->query($ciQuery) === TRUE) {
						$oodinsert = true;
					}else {
			            echo "Error: " . $ciQuery . "<br>" . $con->error;
			        }
	            }
	        }

	        if ($odinsert == true && $oodinsert == true ) {
	        	unset($_SESSION["shopping_cart"]);
	    		echo '<script>alert("Your Order is done. You will contact with you soon.")</script>';
	    		echo '<script>window.location="confirm.php?order_number='.$order_number.'"</script>';
	    	}else {
	    		echo "Error: " . $iquery . "<br>" . $con->error;
	    		echo "Error: " . $ciQuery . "<br>" . $con->error;
	        } 
	    }
	}

	if (isset($_POST['post'])) {
		if (!isset($_SESSION['isLoggedIn'])) {
			echo '<script>alert("You Need Login First")</script>';
			echo '<script>window.location="login.php"</script>';
		}else{
			date_default_timezone_set("Asia/Dhaka");
		    $make_time =date("h:i:sa");
		    $make_date =date("Y-m-d");
		    $u_id = $_SESSION['id'];

			$title = $_POST['title'];
			$postdescription = $_POST['description'];

			$imgfile=$_FILES["postimage"]["name"];
			// get the image extension
			$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
			// allowed extensions
			$allowed_extensions = array(".jpg",".jpeg",".png",".gif");
			// Validation for allowed extensions .in_array() function searches an array for a specific value.
			if(!in_array($extension,$allowed_extensions))
			{
			echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
			echo '<script>window.location="blog.php"</script>';
			}
			else
			{
				//rename the image file
				$imgnewfile=($imgfile).$extension;
				// Code for move image into directory
				move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);

				$iquery="INSERT INTO `tblpost`(`user_id`, `postDate`, `postTime`, `image`, `postTitle`, `postDetails`) 
					    VALUES ('$u_id','$make_date','$make_time','$imgnewfile','$title','$postdescription');";
				if ($con->query($iquery) === TRUE) {
					echo '<script>alert("Post Successfully.")</script>';
					echo '<script>window.location="blog.php"</script>';
				}else {
		            echo "Error: " . $iquery . "<br>" . $con->error;
		        }
		    }
	    }

	}

	if (isset($_POST['comment'])) {
		if (!isset($_SESSION['isLoggedIn'])) {
			echo '<script>alert("You Need Login First")</script>';
			echo '<script>window.location="login.php"</script>';
		}else{
			date_default_timezone_set("Asia/Dhaka");
	    $make_time =date("h:i:sa");
		    $make_date =date("Y-m-d");

			$comment = $_POST['commentText'];
			$postId = $_POST['post_id'];
			$u_id = $_SESSION['id'];

			$iquery="INSERT INTO `tblcomments`(`postId`, `user_id`, `comment`, `date`, `time`) 
				    VALUES ('$postId','$u_id','$comment','$make_date','$make_time');";
			if ($con->query($iquery) === TRUE) {
				echo '<script>alert("Comment Successfully.")</script>';
				echo '<script>window.location="single-blog.php?post_id='.$postId.'"</script>';
			}else {
	            echo "Error: " . $iquery . "<br>" . $con->error;
	        }
		}
	}

	if (isset($_POST['replay'])) {
		if (!isset($_SESSION['isLoggedIn'])) {
			echo '<script>alert("You Need Login First")</script>';
			echo '<script>window.location="login.php"</script>';
		}else{
			date_default_timezone_set("Asia/Dhaka");
		    $make_time =date("h:i:sa");
		    $make_date =date("Y-m-d");

		    $u_id = $_SESSION['id'];
			$replay = $_POST['replayText'];
			$comment_id = $_POST['comment_id'];
			$postId = $_POST['post_id'];

			$iquery="INSERT INTO `tblreplay`(`comment_id`, `user_id`, `replay`, `date`, `time`) 
				    VALUES ('$comment_id','$u_id','$replay','$make_date','$make_time');";
			if ($con->query($iquery) === TRUE) {
				echo '<script>alert("Replay Successfully.")</script>';
				echo '<script>window.location="single-blog.php?post_id='.$postId.'"</script>';
			}else {
	            echo "Error: " . $iquery . "<br>" . $con->error;
	        }
	    }
	}

	if (isset($_POST['contacMail'])) {
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$sms=$_POST['sms'];

		$adminEmail = "abusaidskbabu@gmail.com";

		include 'mailSender.php';
		$mail->Body = '<html><body>
                You have a mail.<br> 
                Name: '.$name.'. <br>
                Phone: '.$phone.'. <br>
                Mail: '.$email.'. <br>
				'.$sms.'. <br>
				Thank You.
                </body></html>';
        $mail->addAddress($adminEmail, "test");
        if($mail->send()) {
        	echo  '<script>alert("Mail Send.")</script>';
            echo '<script>window.location="contact.php"</script>';
        }else{
            echo  '<script>alert("mail not send")</script>';
        }  
	}

?>
