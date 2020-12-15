<?php 

        $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }

        if(isset($_GET['pro_id']))
        {
            $pro_id = $_GET['pro_id'];
            $query = " delete from product where pro_id = '".$pro_id."'";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:viewproduct.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:viewproduct.php");
        }

?>