<?php 

    $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }


    if(isset($_POST['update']))
    {
        $username = $_POST['username'];
        $pswd = $_POST['pswd'];
    
        $query = " update admin set username = '".$username."', pswd='".$pswd."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:admin.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:admin.php");
    }


?>
