<?php 
include('session.php');
 $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }
    $c_mobile=$_SESSION["favanimal"];
    $query = " select * from customer where c_mobile='$c_mobile'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $c_fname = $row['c_fname'];
        $c_lname = $row['c_lname'];
        $c_pswd = $row['c_pswd'];
        $c_mobile = $row['c_mobile'];
         $c_address = $row['c_address'];
         $c_gender = $row['c_gender'];
         $c_dob = $row['c_dob'];
        
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
  <title>Edit Profile</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <center><a href="/AD/customer_login/customer.php"><button class="btn btn-primary" name="submit">Back to Dashboard</button></a></center>
                            <br>
                            <form action="db_update.php?c_mobile=<?php echo $c_mobile ?>" method="post">
                                <p>First Name:</p>
                                <input type="text" class="form-control mb-2" placeholder=" First Name " name="c_fname" value="<?php echo $c_fname ?>">
                                <p>Last Name:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Last Name" name="c_lname" value="<?php echo $c_lname ?>">
                                <p>Password:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Password " name="c_pswd" value="<?php echo $c_pswd ?>">
                                <p>Mobile:</p>
                                <p ><?php echo $c_mobile ?> - ( Can't Update Due to security Reason )</p>
                                <p>Address:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Address " name="c_address" value="<?php echo $c_address ?>">
                                <p>Gender:</p>
                                <input type="text" class="form-control mb-2" text-transform: lowercase; placeholder=" Gender " name="c_gender" value="<?php echo $c_gender ?>">
                                <p>DOB:</p>
                                <input type="date" class="form-control mb-2" placeholder=" DOB " name="c_dob" value="<?php echo $c_dob ?>">
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>