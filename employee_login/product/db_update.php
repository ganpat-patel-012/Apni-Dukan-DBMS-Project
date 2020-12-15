<?php 

    $con=mysqli_connect("localhost","root","","store");
    if(!$con)
    {
        die(" Connection Error ");
    }


    if(isset($_POST['update']))
    {
        
        $pro_id = $_GET['pro_id'];
 $pro_name = $_POST['pro_name'];
 $cat_id = $_POST['cat_id'];
 $price = $_POST['price'];
 $pro_des = $_POST['pro_des'];

        $query = " update product set pro_id = '".$pro_id."',pro_name = '".$pro_name."', cat_id='".$cat_id."',price='".$price."' ,pro_des='".$pro_des."' where pro_id='".$pro_id."'";
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
