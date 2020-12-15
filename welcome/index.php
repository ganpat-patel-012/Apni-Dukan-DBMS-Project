<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Now! </title>
</head>
<body class="bg-dark">
<?php include('navbar.php');?>
    <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Register Now! </h3>
                        </div>
                        <div class="card-body">
                        
                            <form action="db_addcust.php" method="post">
                                <p>First Name:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Enter First Name " name="c_fname">
                                <p>Last Name:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Enter Last Name " name="c_lname">
                                <p>Passward:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Enter Passward " name="c_pswd">
                                <p>Mobile:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Enter Mobile Number " name="c_mobile">
                                <p>Address:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Enter Address " name="c_address">
                                <p>Gender:</p>
                                <select class="form-control" style="font-family:Roboto, sans-serif;" name="c_gender"><option value="m" selected="">Male</option><option value="f" placeholder=" Enter Gender ">Female</option></select><br>
                                <p>Date of birth:</p>
                                <input type="date" class="form-control mb-2" placeholder=" Enter DOB " name="c_dob">
                                <button class="btn btn-primary" name="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>