<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: index.php"); // Redirecting To Home Page
}
?> 
              
<!DOCTYPE html>
<html>    
<head>
    <meta charset="utf-8">
    <link rel="icon" href="assets/img/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin View</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/navbar-dukaan.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div>
    
    <nav class="navbar navbar-light navbar-expand-md fixed-top bg-info border-info">
            <div class="container-fluid"><img id="logo" src="assets/img/images.png"><a class="navbar-brand" id="brand" href="/AD/index.php"><strong>Apni Dukaan</strong></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="/AD/contact/index.php"><strong>Contact Us</strong></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="updateadmin.php"><strong>Edit Profile</strong></a></li>
                        <li class="nav-item" role="presentation"></li>
                    </ul>
            </div>
                <a href="logout.php"><button class="btn btn-primary" type="button" >Log out</button></a>
   </div>
    </nav>
</div>
    
    <center>
    <div class="container-fluid">
                <div class="row" style="margin-top: 100px;">
                      <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0);">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Manage Customer&nbsp;</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            
                                            <a href="customer/addcustomer.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px;">Add Customer</button></a>
                                            
                                            <a href="customer/viewcustomer.php"><button class="btn btn-primary" type="button" style="margin-left: 5px;margin-right: 5px;background-color: rgb(21,31,59);">View Customer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0);">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Manage Product&nbsp;</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            
                                            <a href="product/addproduct.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px;">Add Product</button></a>
                                            
                                            <a href="product/viewproduct.php"><button class="btn btn-primary" type="button" style="margin-left: 5px;margin-right: 5px;background-color: rgb(21,31,59);">View Product</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0);">
                            <div class="card-body">
                                <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Manage Employee&nbsp;</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            
                                            <a href="employee/addemployee.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px;">Add Employee</button></a>
                                            
                                            <a href="employee/viewemployee.php"><button class="btn btn-primary" type="button" style="margin-left: 5px;margin-right: 5px;background-color: rgb(21,31,59);">View Employee</button></a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0);">
                            <div class="card-body">
                                <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Customer Quries&nbsp;</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            
                                            <a href="viewquries.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px;">Check Now</button></a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </center>
</body>
</html>





