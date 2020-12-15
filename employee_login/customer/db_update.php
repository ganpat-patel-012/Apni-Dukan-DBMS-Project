<?php 

    $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }


    if(isset($_POST['update']))
    {
        
        $c_mobile = $_GET['c_mobile'];
        $c_fname = $_POST['c_fname'];
 $c_lname = $_POST['c_lname'];
 $c_pswd = $_POST['c_pswd'];
 $c_address = $_POST['c_address'];
        $c_gender = $_POST['c_gender'];
        $c_dob = $_POST['c_dob'];
        

        $query = " update customer set c_mobile = '".$c_mobile."',c_fname = '".$c_fname."', c_lname='".$c_lname."',c_pswd='".$c_pswd."', c_address='".$c_address."', c_gender='".$c_gender."',c_dob='".$c_dob."' where c_mobile='".$c_mobile."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:viewcustomer.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:viewcustomer.php");
    }


?>
