<?php

session_start();

$name     	= $_POST['name'];
$email  	= $_POST['email'];
$message  	= $_POST['message'];

if($name == ''){
    $_SESSION['msg']= 'Please insert your Name first.<br>';
    header('location:contact.php');
    exit;
}
if($email == ''){
    $_SESSION['msg']= 'Please insert your email address.<br>';
    header('location:contact.php');
    exit;
}
if($message == ''){
    $_SESSION['msg']= 'Please write your message.<br>';
    header('location:contact.php');
    exit;
}

include_once 'include/config.php';

$sql="INSERT INTO contact_us (Name,Email,Message)
		VALUES ('$name','$email','$message')";

if($con->query($sql)){
    $_SESSION['msg']= 'Thanks for your message.<br>';
    header('location:contact.php');
}else{
    $_SESSION['msg']= 'Message not sent!<br>';
    header('location:contact.php');
}




?>