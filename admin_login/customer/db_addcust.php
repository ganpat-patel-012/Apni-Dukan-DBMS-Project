<?php

    $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }

    if(isset($_POST['submit']))
    {
            $c_fname = $_POST['c_fname'];
            $c_lname = $_POST['c_lname'];
            $c_pswd = $_POST['c_pswd'];
            $c_mobile = $_POST['c_mobile'];
            $c_address = $_POST['c_address'];
            $c_gender = $_POST['c_gender'];
            $c_dob = $_POST['c_dob'];
        

            $query = " insert into customer (c_fname, c_lname, c_pswd, c_mobile,c_address,c_gender,c_dob) values('$c_fname','$c_lname','$c_pswd','$c_mobile','$c_address','$c_gender','$c_dob')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:viewcustomer.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
    }
    else
    {
        header("location:viewcustomer.php");
    }



?>