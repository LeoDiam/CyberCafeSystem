<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: displayprices.html');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-toastr/toastr.min.css"/>
    <script src="assets/jquery.min.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/bootstrap-toastr/toastr.js"></script>
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>Website Title</h1>
        <a href="displayprices.html"><i class="fas fa-dollar-sign"></i>Prices</a>
        <a href="register.html"><i class="fas fa-user-circle"></i>Register a new user</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2>Home Page</h2>
    <?php
        include('time.php');
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="progress progress-striped active" style="margin-bottom: 0px!important;margin-top:10px;">
                <div class="progress-bar progress-bar-info" id="timebar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <strong class="text-center" id="percent"></strong>
                </div>
            </div>
        </div>
    </div>

    
    <p>Welcome back, <?=$_SESSION['name']?>!</p>
</div>


</body>
</html>

