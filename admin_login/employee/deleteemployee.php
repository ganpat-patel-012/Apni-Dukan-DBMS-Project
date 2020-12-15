<?php 

        $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }

        if(isset($_GET['e_mobile']))
        {
            $e_mobile = $_GET['e_mobile'];
            $query = " delete from employee where e_mobile = '".$e_mobile."'";
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