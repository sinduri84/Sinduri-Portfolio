<?php 
    if(!$user_image) {
        $profile_image = '';
    } else {
        $profile_image = '<img class="img-fluid img-thumbnail" id="navbar-img" src="'.$user_image.'" alt="Profile Image">';
    }
    if(!$user_id) {
        $button1 = '<a class="nav-link" href="login.php">Login</a>';
        $button2 = '<a class="nav-link" href="signup.php">Sign Up</a>';
    } else {
        $button1 = '<a class="nav-link" href="user_detail.php?id={$user_id}">Welcome '.$user_fname.'</a>';
        $button2 = '<a class="nav-link" href="logout.php?logout">Logout</a>';
    }

    if(!$user_type) {
        $button3 = '';
        $button4 = '';
    } else {
        if($user_type == 'super_admin') {
            $button4 = '<a class="nav-link" href="admin_panel.php">Admin Panel</a>';
            $button3 = '<a class="nav-link" href="blog_insert.php">New Blog Post</a>';
        } elseif($user_type == 'admin') {
            $button3 = '<a class="nav-link" href="create_post.php">New Blog Post</a>';
            $button4 = '';
        } else {
            $button3 = '';
            $button4 = '';
        }
    }

?>

<nav class="navbar navbar-expand-md sticky-top">
    <a class="navbar-brand" href="index.php">Sinduri Guntupalli</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
        <span class="custom-navbar-toggler-icon"><i class="fas fa-hand-point-down"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarLinks">
        <ul class="navbar-nav mr-auto d-flex justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="projects.php">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="resume.php">Resume</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="travel_blog.php">Travel-Blog</a>
            </li>
            <li class="nav-item">
                <?php echo $button3 ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a href="https://www.instagram.com/sindurigf/"><span class='px-2 nav-link'><i class="fab fa-instagram"></i></span></a>
            </li>
            <li class="nav-item">
                <a href="https://www.linkedin.com/in/sinduri-guntupalli-307542131/"><span class='px-2 nav-link'><i class="fab fa-linkedin-in"></i></span></a>
            </li>
            
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item d-flex align-items-center">
                <?php echo $button4 ?>
            </li>
            <li class="nav-item d-flex align-items-center">
                <?php echo $button1 ?>
            </li>
            <li class="nav-item d-flex align-items-center">
                <?php echo $profile_image ?>
            </li>
            <li class="nav-item d-flex align-items-center">
                <?php echo $button2 ?>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid m-0 p-0 main-container-header">