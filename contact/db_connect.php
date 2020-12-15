<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$calltime = $_POST['calltime'];
$comments = $_POST['comments'];
if (!empty($name) && !empty($email) && !empty($phone) && !empty($calltime) && !empty($comments)) {
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
     $insert = "INSERT Into contact(name,email, phone, calltime, comments) values (?,?,?,?,?)";
      $stmt = $conn->prepare($insert);
      $stmt->bind_param('sssss', $name,$email, $phone, $calltime, $comments);
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
