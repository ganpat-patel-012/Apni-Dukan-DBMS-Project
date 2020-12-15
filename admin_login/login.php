 <?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['pswd'])) {
$error = "Username or Password is invalid";
}
else{
// Define $mobile and $pswd
$username = $_POST['username'];
$pswd = $_POST['pswd'];
$_SESSION["favanimal"] = $_POST['username'];
echo "Session variables are set.";
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("127.0.0.1", "root", "", "store");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username, pswd from admin where username=? AND pswd=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $pswd);
$stmt->execute();
$stmt->bind_result($username, $pswd);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $username; // Initializing Session
header("location: customer.php"); // Redirecting To Profile Page
}
mysqli_close(); // Closing Connection
}
?>

