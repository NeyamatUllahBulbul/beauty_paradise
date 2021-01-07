<!-- manage-login.php -->
<?php 
session_start();
include 'include/config.php';

	if (isset($_POST['signup'])){
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        $checkSQL = "SELECT * FROM `users` WHERE email = '$email';";
        $checkresult = $con->query($checkSQL);
        if ($checkresult->num_rows > 0) {
        	echo '<script>alert("Username already exists.")</script>';
        	echo '<script>window.location="signup.php"</script>';
        }else{

	    	$iquery="INSERT INTO `users`(`name`, `email`, `phone`, `address`, `password`) 
        		VALUES ('$fullname','$email','$phone','$address','$password');";
        	if ($con->query($iquery) === TRUE) {
        		echo '<script>alert("You Register successfully")</script>';
        		echo '<script>window.location="login.php"</script>';
        	}else {
                echo "Error: " . $iquery . "<br>" . $con->error;
            }	   
        }
    }


    if (isset($_POST['login'])) {
    
	  $email = $_POST['email'];
	  $password = $_POST['password'];


	  $emailSQL = "SELECT * FROM users WHERE email = '$email';";

	  $passwordSQL = "SELECT * FROM users WHERE email = '$email' And password = '$password';";

	  $emailResult = $con->query($emailSQL);

	  $passwordResult = $con->query($passwordSQL);

	  if ($emailResult->num_rows <= 0) {
	    echo '<script>alert("This Email Does Not Exist.")</script>';
	    echo '<script>window.location="login.php"</script>';
	  }else if ($passwordResult->num_rows <= 0) {
	    echo '<script>alert("This Password is Incorrect.")</script>';
	    echo '<script>window.location="login.php"</script>';
	  }else{

	    $_SESSION['isLoggedIn'] = TRUE;

	    $SQL = "SELECT * FROM users WHERE email = '$email' And password = '$password';";

	    $result = $con->query($SQL);

	    foreach ($result as $r) {
	      $_SESSION['id'] = $r['id'];
	      $_SESSION['name'] = $r['name'];
	      $_SESSION['email'] = $r['email'];
	      $_SESSION['password'] = $r['password'];
	    }
	    
	    echo '<script>window.location="index.php"</script>';
	   
	  }
	}
?>