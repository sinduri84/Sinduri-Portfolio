<?php 

	require 'actions/session_start.php';

	if(isset($_GET['logout'])) {
		unset($_SESSION['user_id']);
		session_unset();
		session_destroy();
		header("Location: travel_blog.php");
		exit;
	}

?>