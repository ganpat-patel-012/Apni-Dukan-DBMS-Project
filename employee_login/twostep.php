<?php 
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['e_word'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['e_word']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['e_fname']." ".$user[0]['e_lname'];
		$_SESSION['userid'] = $user[0]['e_id'];
		$_SESSION['e_word'] = $user[0]['e_word'];		
		$_SESSION['e_address'] = $user[0]['e_address'];
		$_SESSION['e_mobile'] = $user[0]['e_mobile'];
		header("Location:invoice_list.php");
	} else {
		$loginError = "Hey! Worng Word";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Two Step Verification</title>
<script src="js/invoice.js"></script>
    <link rel="icon" href="assets/img/images.png">
<link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <br><br><br><br><br><br><br>
<div class="row">	
	<div class="login-form">
        <br>
		<h1><strong>Two - Step Verification :</strong></h1>
        <br>
		<form method="post" action="">
			<div class="form-group">
			<?php if ($loginError ) { ?>
				<div class="alert alert-warning"><?php echo $loginError; ?></div>
			<?php } ?>
			</div>
			<div class="form-group">
				<input name="e_word" id="e_word" type="text" class="form-control" placeholder="Enter Super Word **" autofocus="" required>
			</div>
            <p>**Super word is set for security reasons.</p>
            <br>
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-primary" type="button">Submit</button>
			</div>
		</form>	
        <a href="employee.php"><button type="submit" name="dashboard" class="btn btn-primary" type="button"> Back to DashBoard</button></a>
	</div>		
</div>	
</body>
</html>
