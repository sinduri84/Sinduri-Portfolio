<?php 
	try {
	    require 'connect.php';

	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$search = $_POST["search"];


		$stmt = $conn->prepare("SELECT *, blog.title AS blog_title FROM `blog` 
INNER JOIN `users` ON blog.fk_poster_id=users.user_id WHERE blog.approved=1 AND (blog.title LIKE '%".$search."%' OR blog.content LIKE '%".$search."%' OR blog.country LIKE '%".$search."%' OR users.username LIKE '%".$search."%')");
		$stmt->execute();
		$row = $stmt->fetchAll();

		if($stmt->rowCount() == 0) {
			echo "No Results found for your query!";
		} else {

			foreach($row as $value) {
		    	echo "<div class='col-md-6 col-lg-4 m-0 p-3 my-4'>
	                    <div class='card text-dark h-100'>
	                        <div class='embed-responsive embed-responsive-16by9'>
	                            <img src='".$value['blog_img']."' class='card-img-top img-fluid img-responsive embed-responsive-item' alt='".$value['blog_title']."'>
	                        </div>
	                        <div class='card-header'>
	                            <h4>".$value['blog_title']."</h4>
	                        </div>
	                        <div class='card-body'>
	                            <h5 class='card-title'>".$value['country']."</h5>
	                            <h5 class='card-title'>".$value['content']."</h5>
	                        </div>
	                        <div class='card-footer'>
	                            <div class='d-flex justify-content-around'>

	                                <a href='blog_detail.php?id=".$value['blog_id']."'><button class='btn btn-warning' type='button'>View</button></a>
	                            </div>

	                        </div>
	                    </div>
	                </div>";
			}
		}
    }
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
	$conn = null;
?>