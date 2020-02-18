<?php
session_start();

require 'connect.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors ='';
$error = false;
$missingEmail = '<p><strong>Please enter your email address or Username!</strong></p>';
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';

$email = trim($_POST['loginemail']);
$email = strip_tags($email);
$email = htmlspecialchars($email);

$password = trim($_POST['loginpassword']);
$password = strip_tags($password);
$password = htmlspecialchars($password);

if(empty($email)) {
	$errors .= $missingEmail; 
	$error = true;  
} else{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
}

if(empty($password)) {
    $errors .= $missingPassword;
    $error = true;
} else{
    $password = filter_var($password, FILTER_SANITIZE_STRING);
}

if($errors) {
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;   
} else {
	$password = hash('sha256', $password);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count =  count($row);

	if(!$stmt){
	    echo '<div class="alert alert-danger">Error running the query!</div>';
	    exit;
	}

	$conn = null;
	
	if($count == 0){
	    echo '<div class="alert alert-danger">Please check your Email or Password</div>';
	} else {
		$_SESSION['user_id']=$row['user_id'];
	    $_SESSION['username']=$row['username'];
	    $_SESSION['email']=$row['email'];
	    $_SESSION['firstname']=$row['firstname'];
	    $_SESSION['lastname']=$row['lastname'];
	    $_SESSION['image']=$row['image'];
	    $_SESSION['usertype']=$row['usertype'];
	}

} 


?>










