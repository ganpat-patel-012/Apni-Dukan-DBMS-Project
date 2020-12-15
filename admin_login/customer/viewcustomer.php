<!DOCTYPE html>
<html>
<head>
 <title>Customer</title>
<link rel="icon" href="assets/img/images.png">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>
<?php include('navbar.php');?>
    <br>
 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Customer Details </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Customer Name </th>
 <th> Mobile </th>
 <th> Address </th>
 <th> Gender </th>
 <th> D-O-B </th>
 <th> Delete </th>
 <th> Update </th>

 </tr >

 <?php
    
$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'store');
   
     
 $q = "select CONCAT(c_fname, ' ', c_lname) as name,c_mobile,c_address,c_gender,c_dob from customer ";

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['name'];  ?> </td>
 <td> <?php echo $res['c_mobile'];  ?> </td>
 <td> <?php echo $res['c_address'];  ?> </td>
 <td> <?php echo $res['c_gender'];  ?> </td>
 <td> <?php echo $res['c_dob'];  ?> </td>
 <td> <button class="btn-danger btn"> <a href="deletecustomer.php?c_mobile=<?php echo $res['c_mobile']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="updatecustomer.php?c_mobile=<?php echo $res['c_mobile']; ?>" class="text-white"> Update </a> </button> </td>

 </tr>

 <?php 
 }
  ?>
 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>