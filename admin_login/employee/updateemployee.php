<?php 


 $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }


    $e_mobile = $_GET['e_mobile'];
    $query = " select * from employee where e_mobile='".$e_mobile."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $e_fname = $row['e_fname'];
        $e_lname = $row['e_lname'];
        $e_word = $row['e_word'];
        $e_pswd = $row['e_pswd'];
        $e_mobile = $row['e_mobile'];
         $e_address = $row['e_address'];
         $e_gender = $row['e_gender'];
         $e_dob = $row['e_dob'];
        
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
  <title>Update Employee</title>
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
                            <h3 class="bg-success text-white text-center py-3"> Update Employee</h3>
                        </div>
                        <div class="card-body">
                            <center><a href="/AD/admin_login/admin.php"><button class="btn btn-primary" name="submit">Back to Dashboard</button></a></center>
                            <br>
                            <form action="db_update.php?e_mobile=<?php echo $e_mobile ?>" method="post">
                                <p>First Name:</p>
                                <input type="text" class="form-control mb-2" placeholder=" First Name " name="e_fname" value="<?php echo $e_fname ?>">
                                <p>Last Name:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Last Name" name="e_lname" value="<?php echo $e_lname ?>">
                                <p>Super Word:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Super Word " name="e_word" value="<?php echo $e_word ?>">
                                <p>Password:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Password " name="e_pswd" value="<?php echo $e_pswd ?>">
                                <p>Mobile:</p>
                                <p ><?php echo $e_mobile ?> - ( Can't Update Due to security Reason )</p>
                                <p>Address:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Address " name="e_address" value="<?php echo $e_address ?>">
                                <p>Gender:</p>
                                <input type="text" class="form-control mb-2" text-transform: lowercase; placeholder=" Gender " name="e_gender" value="<?php echo $e_gender ?>">
                                <p>DOB:</p>
                                <input type="date" class="form-control mb-2" placeholder=" DOB " name="e_dob" value="<?php echo $e_dob ?>">
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>