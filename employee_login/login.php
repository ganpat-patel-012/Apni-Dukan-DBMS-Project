 <?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['e_mobile']) || empty($_POST['e_pswd'])) {
$error = "Username or Password is invalid";
}
else{
// Define $mobile and $pswd
$e_mobile = $_POST['e_mobile'];
$e_pswd = $_POST['e_pswd'];
$_SESSION["favanimal"] = $_POST['e_mobile'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("127.0.0.1", "root", "", "store");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT e_mobile, e_pswd from employee where e_mobile=? AND e_pswd=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $e_mobile, $e_pswd);
$stmt->execute();
$stmt->bind_result($e_mobile, $e_pswd);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $e_mobile; // Initializing Session
header("location: employee.php"); // Redirecting To Profile Page
}
mysqli_close(); // Closing Connection
}
?>
