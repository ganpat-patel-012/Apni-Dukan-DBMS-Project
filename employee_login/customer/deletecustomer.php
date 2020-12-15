<?php 

        $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }

        if(isset($_GET['c_mobile']))
        {
            $c_mobile = $_GET['c_mobile'];
            $query = " delete from customer where c_mobile = '".$c_mobile."'";
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