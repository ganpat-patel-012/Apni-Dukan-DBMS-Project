 <?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['c_mobile']) || empty($_POST['c_pswd'])) {
$error = "Username or Password is invalid";
}
else{
// Define $mobile and $pswd
$c_mobile = $_POST['c_mobile'];
$c_pswd = $_POST['c_pswd'];
$_SESSION["favanimal"] = $_POST['c_mobile'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("127.0.0.1", "root", "", "store");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT c_mobile, c_pswd from customer where c_mobile=? AND c_pswd=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $c_mobile, $c_pswd);
$stmt->execute();
$stmt->bind_result($c_mobile, $c_pswd);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $c_mobile; // Initializing Session
header("location: customer.php"); // Redirecting To Profile Page
}
mysqli_close(); // Closing Connection
}
?>
