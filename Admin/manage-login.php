<!-- manage-login.php -->
<?php 
	session_start();
	include 'include/config.php';
	if (isset($_POST['login'])) {
    
	  $username = $_POST['username'];
	  $password = $_POST['password'];


	  $emailSQL = "SELECT * FROM tbladmin WHERE AdminUserName = '$username';";

	  $passwordSQL = "SELECT * FROM tbladmin WHERE AdminUserName = '$username' And AdminPassword = '$password';";

	  $emailResult = $con->query($emailSQL);

	  $passwordResult = $con->query($passwordSQL);

	  if ($emailResult->num_rows <= 0) {
	    echo '<script>alert("This Username Does Not Exist.")</script>';
	     echo '<script>window.location="login.php"</script>';
	  }else if ($passwordResult->num_rows <= 0) {
	    echo '<script>alert("This Password is Incorrect.")</script>';
	     echo '<script>window.location="login.php"</script>';
	  }else{

	    $_SESSION['isLoggedIn'] = TRUE;

	    $SQL = "SELECT * FROM tbladmin WHERE AdminUserName = '$username' And AdminPassword = '$password';";

	    $result = $con->query($SQL);

	    foreach ($result as $r) {
	      $_SESSION['id'] = $r['id'];
	      $_SESSION['name'] = $r['AdminUserName'];
	      $_SESSION['email'] = $r['AdminEmailId'];
	      $_SESSION['password'] = $r['AdminPassword'];
	    }
	    
	    echo '<script>window.location="index.php"</script>';
	   
	  }
	}
?>