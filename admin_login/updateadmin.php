<?php 

include('session.php');
 $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }
    $query = " select * from admin";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $username = $row['username'];
        $pswd = $row['pswd'];
        
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
                            <center><a href="/AD/admin_login/admin.php"><button class="btn btn-primary" name="submit">Back to Dashboard</button></a></center>
                            <br>
                            <form action="db_update.php" method="post">
                                <p>Username:</p>
                                <input type="text" class="form-control mb-2" placeholder=" First Name " name="username" value="<?php echo $username ?>">
                                <p>Password:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Password " name="pswd" value="<?php echo $pswd ?>">
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>