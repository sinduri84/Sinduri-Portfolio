<?php 
  define("TITLE", "EDIT BLOG POSTS");
  require 'actions/session_start.php';
  require 'includes/head.php';
  require 'includes/travel_header.php';
?>
<div class="container">
    <form method='post' name='approvalform' action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="row d-flex justify-content-around">
            <div class="col-md-4 text-dark py-1">
                <div class="card h-100">
                    <div class='embed-responsive embed-responsive-16by9'>
                        <img src="https://cdn.pixabay.com/photo/2016/02/07/14/45/smartphone-1184883_1280.png" class="card-img-top img-fluid embed-responsive-item" alt="">
                    </div>
                    <div class='card-header'>
                        <h4></h4>
                    </div>
                    <div class="card-footer text-center">
                        <a href="blog_insert.php"><button class='btn btn-warning' type='button'>Create New Blog Post</button></a>
                    </div>
                </div>
            </div>
            <?php 

    	require 'actions/connect.php';
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$stmt = $conn->prepare("SELECT *, blog.title AS blog_title FROM `blog` INNER JOIN `users` ON blog.fk_poster_id=users.user_id WHERE blog.approved=1");
		$stmt->execute();
		$row = $stmt->fetchAll();

		foreach($row as $value) {
	    	echo "<div class='col-md-4 text-dark py-1'>
                    <div class='card h-100'>
                        <div class='embed-responsive embed-responsive-16by9'>
                            <img src='".$value['blog_img']."' class='card-img-top img-fluid embed-responsive-item' alt='".$value['blog_title']."'>
                        </div>
                        <div class='card-header'>
                            <h4>".$value['blog_title']."</h4>
                            <p><input type='hidden' name='blog_id[]' value='".$value['blog_id']."'/></p>
                        </div>
                        <div class='card-footer'>
                            <div class='d-flex justify-content-around'>

                                <a href='blog_detail.php?id=".$value['blog_id']."'><button class='btn btn-warning' type='button'>View</button></a>
                                <div class=''>
									<div class='form-group'>
						<div class='form-check-inline'>
							Approval 
							<label class='ml-3 form-check-label'>
							<input type='radio' class='form-check-input' name='approved".$value['blog_id']."'  value='1' ".($value['approved'] == 1 ? "checked='checked'" : '').">Yes
							</label>
							</div>
						<div class='form-check-inline mb-3'>
							<label class='ml-3 form-check-label'>
							<input type='radio' class='form-check-input' name='approved".$value['blog_id']."'  value='0' ".($value['approved'] == 0 ? "checked='checked'" : '').">No</label>
						</div>

					</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>";
			}
		
     ?>
        </div>
        <input class='ml-auto btn btn-info' name='submit' type='submit' value='Update All'>
    </form>
</div>
<?php 
  require 'includes/footer.php';
  if (isset( $_POST['submit'] ) ) {

        foreach($_POST['blog_id'] as $blog_id){
                     echo $sql = "UPDATE `blog` SET `approved`= '".$_POST['approved'.$blog_id]."' WHERE blog_id = ".$blog_id;
                     echo "<br>";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            print_r($stmt);
        }

        echo '<script>window.location = "blog_posts_edit.php";</script>';
    }
    $conn = null;
?>
<script src="js/admin_ajax.js" type="text/javascript" charset="utf-8"></script>
<?php 
  require 'includes/tail.php';
?>