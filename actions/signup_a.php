<?php

    ob_start();

    session_start();

    require 'connect.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $error = false;
    $errors = "";

    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $firstname = trim($_POST['firstname']);
    $firstname = strip_tags($firstname);
    $firstname = htmlspecialchars($firstname);

    $lastname = trim($_POST['lastname']);
    $lastname = strip_tags($lastname);
    $lastname = htmlspecialchars($lastname);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $image = trim($_POST['image']);
    $image = strip_tags($image);
    $image = htmlspecialchars($image);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $password2 = trim($_POST['password2']);
    $password2 = strip_tags($password2);
    $password2 = htmlspecialchars($password2);

    if(empty($username)) {
        $errors .= 'Please enter a username.<br>';
        $error = true;
    } elseif (strlen($username) < 3) {
        $error = true;
        $errors .= "User Name must have at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z0-9]+$/",$username)) {
        $error = true ;
        $errors .= "User Name must only contain alphabets and numbers.";
    } else{
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);   
    }

    if(empty($firstname)) {
        $errors .= 'Please enter a name.<br>';
        $error = true;
    }

    if(empty($email)) {
        $errors .= "Please enter valid email address.<br>"; 
        $error = true;  
    } else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors .= "Please enter a valid email address.<br>";
            $error = true;  
        }
    }

    if(empty($_POST['password'])) {
        $errors .= "Please enter a password.<br>";
        $error = true;
    } elseif(!(strlen($_POST["password"])>6
             and preg_match('/[A-Z]/',$_POST["password"])
             and preg_match('/[0-9]/',$_POST["password"])
            )) {
        $errors .= "Please enter a password with atleast 6 characters.<br>"; 
        $error = true;
    } else{
        $password = filter_var($password, FILTER_SANITIZE_STRING); 
        if(empty($_POST['password2'])){
            $errors .= "Please confirm password.<br>";
            $error = true;
        }else{
            $password2 = filter_var($password2, FILTER_SANITIZE_STRING);
            if($password !== $password2){
                $errors .= "Passwords do not match. Please check again.<br>";
                $error = true;
            }
        }
    }

    if(isset($_POST["image"])) {
        $image = filter_var($image, FILTER_SANITIZE_URL);
        if(!filter_var($image, FILTER_VALIDATE_URL)){
            $errors .= "Please enter a valid URL.<br>";
            $error = true;  
        }
    } 

    $password = hash('sha256', $password);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count =  $stmt->fetchColumn();

    if(!$stmt){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        exit;
    }

    if($count > 0){
        echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';
        $error = true;  
        exit;
    }

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count =  $stmt->fetchColumn();
    if(!$stmt){
        echo '<div class="alert alert-danger">Error running the query!</div>'; 
        exit;
    }

    if($count > 0){
        echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';
        $error = true; 
        exit;
    }

    if($errors){
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;
        exit;
    }


    if(!$error) {

        $sql = "INSERT INTO `users`(`username`, `firstname`, `lastname`, `email`, `password`, `image`) VALUES ('$username', '$firstname', '$lastname', '$email', '$password', '$image')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        if(!$stmt) {
            echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
            exit;
        } else {
            echo '<div class="alert alert-info">Successfully registered. You may login now.</div>
            <script>window.setTimeout( function(){
               window.location = "travel_blog.php";
           }, 2000 );</script>';
        }
    }

    $conn = null;

    ob_end_flush();
?>