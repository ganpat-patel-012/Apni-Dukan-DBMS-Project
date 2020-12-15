<?php

    $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }

    if(isset($_POST['submit']))
    {
            $e_fname = $_POST['e_fname'];
            $e_lname = $_POST['e_lname'];
            $e_pswd = $_POST['e_pswd'];
            $e_word = $_POST['e_word'];
            $e_mobile = $_POST['e_mobile'];
            $e_address = $_POST['e_address'];
            $e_gender = $_POST['e_gender'];
            $e_dob = $_POST['e_dob'];
        

            $query = " insert into employee (e_fname, e_lname, e_pswd, e_word, e_mobile,e_address,e_gender,e_dob) values('$e_fname','$e_lname','$e_pswd','$e_word','$e_mobile','$e_address','$e_gender','$e_dob')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:viewemployee.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
    }
    else
    {
        header("location:viewemployee.php");
    }



?>