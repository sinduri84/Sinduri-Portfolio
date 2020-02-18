<?php 
    define("TITLE", "LOGIN");
    require 'actions/session_start.php';
    if($user_name) {
        header("Location: travel_blog.php");
    }
    require 'includes/head.php';
    require 'includes/travel_header.php';

?>
<div class="my-2">
    <h1 class="text-center">LOGIN</h1>
    <div class="w-25 mx-auto">
        <!--Login form-->
        <form method="post" id="loginform">
            <div id="loginmessage"></div>
            <div class="form-group">
                <label for="loginemail" class="sr-only">Email:</label>
                <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
            </div>
            <div class="form-group">
                <label for="loginpassword" class="sr-only">Password</label>
                <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
            </div>
    </div>
    <div class="mx-auto w-25 d-flex justify-content-around">
        <input class="btn btn-info" name="login" type="submit" value="Login">
        <a class="nav-link p-0 m-0" href="travel_blog.php">
            <button type="button" class="btn btn-danger login-btn">
                Cancel
            </button>
        </a>
        <a class="nav-link p-0 m-0" href="signup.php">
            <button type="button" class="btn btn-success login-btn pull-left">Signup</button>
    </div>
    </form>
</div>
</div>
<?php 
  require 'includes/footer.php';
?>
<script src="js/travel_blog_ajax.js" type="text/javascript" charset="utf-8"></script>
<?php 
  require 'includes/tail.php';
?>