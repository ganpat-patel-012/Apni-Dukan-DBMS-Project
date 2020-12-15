<?php
session_start();
include 'Invoice.php';
$invoice = new Invoice();
if($_POST['action'] == 'delete_invoice' && $_POST['e_id']) {
	$invoice->deleteInvoice($_POST['e_id']);	
	$jsonResponse = array(
		"status" => 1	
	);
	echo json_encode($jsonResponse);	
}
if($_GET['action'] == 'logout') {
session_unset();
session_destroy();
header("Location:newinvoice.php");
}