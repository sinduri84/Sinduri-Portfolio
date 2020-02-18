<?php 
session_start(); 

if (isset($_SESSION['usertype'])) { 
  $user_type = $_SESSION['usertype'];
} else {
  $user_type = null;
}

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['username'];
	$user_fname = $_SESSION['firstname'];
	$user_email = $_SESSION['email'];
	$user_image = $_SESSION['image'];
} else {
	$user_id = $user_fname = $user_email = $user_image = $user_name = null;
}
?>

