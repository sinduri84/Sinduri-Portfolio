<?php 

try {
    require 'connect.php';
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$error = false;
	$errors = "";

    $title = trim($_POST['title']);
    $title = strip_tags($title);
    $title = htmlspecialchars($title);

    $content = trim($_POST['content']);
    $content = strip_tags($content);
    $content = htmlspecialchars($content);

    $country = trim($_POST['country']);
    $country = strip_tags($country);
    $country = htmlspecialchars($country);

    $blog_img = trim($_POST['blog_img']);
    $blog_img = strip_tags($blog_img);
    $blog_img = htmlspecialchars($blog_img);


    if(empty($title)) {
        $errors .= 'Please enter a title.<br>';
        $error = true;
    } elseif (strlen($title) < 3) {
        $error = true;
        $errors .= "title must have at least 3 characters.";
    } else{
        $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);   
    }

    if(empty($country)) {
        $errors .= 'Please enter a country.<br>';
        $error = true;
    } elseif (strlen($country) < 3) {
        $error = true;
        $errors .= "Country must have at least 3 characters.";
    } else{
        $country = filter_var($_POST["country"], FILTER_SANITIZE_STRING);   
    }

    if(empty($blog_img)) {
        $errors .= 'Please enter the path for the image.<br>';
        $error = true;
    } else{
        $blog_img = $_POST["blog_img"];   
    }


    if($errors){
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;
        exit;
    }

    $user_id = $_POST["user_id"];

    if(!$error) {
    	$sql = "SELECT * FROM users WHERE user_id = $user_id";
    	$stmt = $conn->prepare($sql);
		$stmt->execute();

    	$count =  $stmt->fetchColumn();

    	if($count == 0){
    		echo "Not logged in";
    	} else {
    		$sql = "SELECT * FROM users WHERE user_id = $user_id";
    		$stmt = $conn->prepare($sql);
			$stmt->execute();
    		$row = $stmt->fetch(PDO::FETCH_ASSOC);
    	}

         print_r($sql);

    	$fk_poster_id = $row['user_id'];

    	$sql = "INSERT INTO `blog`(`title`, `content`, `country`, `fk_poster_id`, `blog_img`) VALUES ('$title', '$content', '$country', '$fk_poster_id', '$blog_img')";
        print_r($sql);

    	$stmt = $conn->prepare($sql);

		$stmt->execute();

    	if(!$stmt) {
            echo '<div class="alert alert-danger">There was an error inserting the blog details in the database!</div>'; 
            exit;
        } else {
            echo '<div class="alert alert-info">Created Successfully!</div>';
          }

    }

}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;

 ?>