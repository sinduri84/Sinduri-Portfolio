<?php 
    define("TITLE", "SIGNUP");
    require 'actions/session_start.php';
    if($user_name) {
        header("Location: travel_blog.php");
    }
    require 'includes/head.php';
    require 'includes/travel_header.php';
?>
<div class="my-2">
    <h1 class="text-center">SIGNUP</h1>
    <div class="travel-hero">
    </div>
    <form class="w-25 mx-auto" method="post" id="signupform">
        <div id="signupmessage"></div>
        <div class="form-group">
            <label for="username" class="sr-only">Username:</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="100">
        </div>
        <div class="form-group">
            <label for="firstname" class="sr-only">Firstname:</label>
            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Firstname" maxlength="100">
        </div>
        <div class="form-group">
            <label for="lastname" class="sr-only">Lastname:</label>
            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Lastname" maxlength="100">
        </div>
        <div class="form-group">
            <label for="email" class="sr-only">Email:</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="100">
        </div>
        <div class="form-group">
            <label for="image" class="sr-only">Image:</label>
            <input class="form-control" type="text" name="image" id="image" placeholder="Image Link" maxlength="100">

        </div>
        <div class="form-group">
            <label for="password" class="sr-only">Choose a password:</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="30">
        </div>
        <div class="form-group">
            <label for="password2" class="sr-only">Confirm password</label>
            <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="30">
        </div>
        <div class="form-group d-flex justify-content-around">
            <button class="btn btn-info m-0" name="signupform" type="submit">Sign up</button>
            <a class="nav-link p-0 m-0" href="travel_blog.php">
                    <button type="button" class="btn btn-danger login-btn">Cancel</button>
            </a>

        </div>
    

</form>
</div>
<?php 
  require 'includes/footer.php';
?>

<script src="js/travel_blog_ajax.js" type="text/javascript" charset="utf-8"></script>

<?php 
  require 'includes/tail.php';
?>