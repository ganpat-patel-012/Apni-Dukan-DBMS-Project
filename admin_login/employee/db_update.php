<?php 

    $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }


    if(isset($_POST['update']))
    {
        
        $e_mobile = $_GET['e_mobile'];
        $e_fname = $_POST['e_fname'];
 $e_lname = $_POST['e_lname'];
 $e_word = $_POST['e_word'];
 $e_pswd = $_POST['e_pswd'];
 $e_address = $_POST['e_address'];
        $e_gender = $_POST['e_gender'];
        $e_dob = $_POST['e_dob'];
        

        $query = " update employee set e_mobile = '".$e_mobile."',e_fname = '".$e_fname."', e_lname='".$e_lname."',e_word='".$e_word."' ,e_pswd='".$e_pswd."', e_address='".$e_address."', e_gender='".$e_gender."',e_dob='".$e_dob."' where e_mobile='".$e_mobile."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:viewemployee.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:viewemployee.php");
    }


?>
