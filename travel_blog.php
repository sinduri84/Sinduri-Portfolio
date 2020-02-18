<?php 
  define("TITLE", "TRAVEL BLOG");
  require 'actions/session_start.php';
  require 'includes/head.php';
  require 'includes/travel_header.php';
  if($user_name) {
      $signup_button = '';
  } else {
    $signup_button = '<a href="signup.php"><button type="button" class="btn btn-lg btn-warning signup">Sign up!</button></a>';
  }
?>
<div class="">
    <div class="d-none d-md-block" id="travel-hero">
      <div class="d-flex flex-column align-items-center justify-content-start">
        <h1>Welcome to my Travel Blog</h1>
        <br>
        <p>Read my travel stories or add your own stories!</p>
        <br>
        <?= $signup_button; ?>
        <br>
      </div>
    </div>
    <nav class="navbar">
        <form class="form-inline ml-auto my-auto" id="form_search" method="post">
            <input class="form-control mr-sm-2" type="search" name='search' id='search' placeholder="Search" aria-label="Search">
        </form>
    </nav>
    <div class="container mx-auto row d-flex justify-content-around" id="results"></div>
</div>
<?php 
  require 'includes/footer.php';
?>
<script src="js/travel_blog_ajax.js" type="text/javascript" charset="utf-8"></script>
<?php 
  require 'includes/tail.php';
?>