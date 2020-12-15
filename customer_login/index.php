<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: customer.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="assets/img/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Customer LogIn</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/navbar-dukaan.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-dark">
        <nav class="navbar navbar-light navbar-expand-md fixed-top bg-info border-info">
            <div class="container-fluid"><img id="logo" src="assets/img/images.png"><a class="navbar-brand" id="brand" href="/AD/index.php"><strong>Apni Dukaan</strong></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="/AD/contact/index.php"><strong>Contact Us</strong></a></li>
                        <li class="nav-item" role="presentation"></li>
                    </ul></div>
    </div>
    </nav>
    <form method="post">
        <h1 class="sr-only">Login Form</h1>
        <h1 class="text-center">Customer</h1>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="form-group"><input class="form-control" type="text" name="c_mobile" placeholder="Enter your Mobile number"></div>
        <div class="form-group"><input class="form-control" type="password" name="c_pswd" placeholder="Enter your Password"></div>
        <input name="submit" type="submit" class="btn btn-primary btn-block" type="submit" value=" Login ">
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>