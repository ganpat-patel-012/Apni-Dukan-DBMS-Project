<?php
            $c_fname = $_POST['c_fname'];
            $c_lname = $_POST['c_lname'];
            $c_pswd = $_POST['c_pswd'];
            $c_mobile = $_POST['c_mobile'];
            $c_address = $_POST['c_address'];
            $c_gender = $_POST['gender'];
            $c_dob = $_POST['c_dob'];
        
if (!empty($c_fname) && !empty($c_lname) && !empty($c_pswd) && !empty($c_mobile) && !empty($c_address) && !empty($c_gender) && !empty($c_dob)) {
    $host = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "store";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     //$SELECT = "SELECT email From register Where email = ? Limit 1";
     $insert = "INSERT Into customer(c_fname,c_lname, c_pswd, c_mobile,c_address,c_gender,c_dob) values (?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($insert);
      $stmt->bind_param('sssssis', $fname,$lname, $pswd, $gender, $dob, $mobile, $address);
      $stmt->execute();
      //echo "New record inserted sucessfully";
      
    $stmt->close();
    $conn->close();
  }
 } else {
 //echo "All field are required";
 //$error = "All field are required";
 die();
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Register Form</title>
</head>
<body>
<center>
    <h1>Successfully Registered as a Customer<br>Have a Good Day</h1>
    </center>
</body>
</html>