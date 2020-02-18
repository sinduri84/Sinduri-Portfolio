<?php 
  define("TITLE", "EDIT BLOG POSTS");
  require 'actions/session_start.php';
  require 'includes/head.php';
  require 'includes/travel_header.php';
?>
<div class="">
	<h3 class="text-center my-2">Create New Blog Post</h3>

		<form method="post" id="insertblog">
			<div class="col-md-6 mx-auto">
				<div id="insertmessage"></div>
				<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
				<div class="form-group">
					<label for="title">Title*</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Title">
				</div>
				
				<div class="form-group">
					<label for="content">Content</label>
					<textarea class="form-control" id="content" name="content" placeholder="Content" rows="4" cols="20"></textarea>
				</div>
				<div class="form-group">
					<label for="country">Country</label>
					<input type="text" class="form-control" id="country" name="country" placeholder="Country">
				</div>

					<div class="form-group">
						<label for="blog_img">Image*</label>
						<input type="text" class="form-control" id="blog_img" name="blog_img" placeholder="Image">
					</div>				
					
				<p class="text-right">* required</p>
			</div>
			<div class="mx-auto w-25 my-5 d-flex justify-content-around">

				<input class="btn btn-info" name="insertblogform" type="submit" value="Create">

				<button type="button" class="btn btn-secondary"><a class='text-light' href='blog_posts_edit.php'>Cancel</a></button>
			</div>
			

		</form>

</div>
<?php 
  require 'includes/footer.php';
?>
<script src="js/admin_ajax.js" type="text/javascript" charset="utf-8"></script>
<?php 
  require 'includes/tail.php';
?>