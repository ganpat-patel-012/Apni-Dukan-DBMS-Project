<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="addassets/img/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="addassets/bootstrap/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> ADD NEW PRODUCT</h3>
                        </div>
                        <div class="card-body">
                            <center><a href="/AD/employee_login/employee.php"><button class="btn btn-primary" name="submit">Back to Dashboard</button></a></center>
                            <br>
                            <form action="db_addpro.php" method="post">
                                <p>Product ID:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Product ID " name="pro_id">
                                <p>Product Name:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Product Name " name="pro_name">
                                <p>Category ID:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Category ID " name="cat_id">
                                <p>Price:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Price " name="price">
                                <p>Description:</p>
                                <input type="text" class="form-control mb-2" placeholder=" Description " name="pro_des">
                                <button class="btn btn-primary" name="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>