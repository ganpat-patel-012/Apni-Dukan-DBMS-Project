<?php

    $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }

    if(isset($_POST['submit']))
    {
            $pro_id = $_POST['pro_id'];
            $pro_name = $_POST['pro_name'];
            $cat_id = $_POST['cat_id'];
            $price = $_POST['price'];
            $pro_des = $_POST['pro_des'];

            $query = " insert into product (pro_id, pro_name, cat_id, price, pro_des) values('$pro_id','$pro_name','$cat_id','$price','$pro_des')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:viewproduct.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
    }
    else
    {
        header("location:viewproduct.php");
    }



?>