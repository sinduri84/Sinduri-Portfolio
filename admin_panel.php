<?php 
  define("TITLE", "ADMIN DASHBOARD");
  require 'actions/session_start.php';
  if($user_type != 'super_admin') {
        header("Location: travel_blog.php");
    }
  require 'includes/head.php';
  require 'includes/travel_header.php';
?>
<div class="my-2">
    <h1 class="text-center">ADMIN PANEL</h1>
    <div class="container mx-auto row d-flex justify-content-around">
        <div class="col-md-3">
            <a href='blog_posts_edit.php'>
                <div class="card h-100">
                    <img src="https://cdn.pixabay.com/photo/2017/12/29/14/14/set-3047724_1280.jpg" class="card-img-top img-fluid" alt="">
                    <div class="card-footer text-center">
                        <button class='btn btn-warning' type='button'>Edit Blog Posts</button>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href='users_edit.php'>
                <div class="card h-100">
                    <img src="https://cdn.pixabay.com/photo/2017/11/12/22/50/human-2944064_1280.jpg" class="card-img-top img-fluid" alt="">
                    <div class="card-footer text-center">
                        <button class='btn btn-warning' type='button'>Edit Users</button>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href='blog_insert.php'>
                <div class="card h-100">
                    <img src="https://cdn.pixabay.com/photo/2016/02/07/14/45/smartphone-1184883_1280.png" class="card-img-top img-fluid" alt="">
                    <div class="card-footer text-center">
                        <button class='btn btn-warning' type='button'>Create New Blog Post</button>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href='user_insert.php'>
                <div class="card h-100">
                    <img src="https://cdn.pixabay.com/photo/2014/12/01/06/46/social-media-552411_1280.jpg" class="card-img-top img-fluid" alt="">
                    <div class="card-footer text-center">
                        <button class='btn btn-warning' type='button'>Create New User</button>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php 
  require 'includes/footer.php';
?>
<?php 
  require 'includes/tail.php';
?>