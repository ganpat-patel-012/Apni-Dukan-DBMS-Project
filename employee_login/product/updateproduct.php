<?php 


 $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }


    $pro_id = $_GET['pro_id'];
    $query = " select * from product where pro_id='".$pro_id."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $pro_id = $row['pro_id'];
        $pro_name = $row['pro_name'];
        $cat_id = $row['cat_id'];
        $price = $row['price'];
        $pro_des = $row['pro_des'];
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
  <title>Update Product</title>
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
                            <h3 class="bg-success text-white text-center py-3"> Update Product</h3>
                        </div>
                        <div class="card-body">
                            <center><a href="/AD/employee_login/employee.php"><button class="btn btn-primary" name="submit">Back to Dashboard</button></a></center>
                            <br>
                            <form action="db_update.php?pro_id=<?php echo $pro_id ?>" method="post">
                                <p>Product ID:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Prodect Name " name="pro_name" value="<?php echo $pro_name ?>">
                                <p>Product Name:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Category ID " name="cat_id" value="<?php echo $cat_id ?>">
                                <p>Category:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Price " name="price" value="<?php echo $price ?>">
                                <p>Description:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Description " name="pro_des" value="<?php echo $pro_des ?>">
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>