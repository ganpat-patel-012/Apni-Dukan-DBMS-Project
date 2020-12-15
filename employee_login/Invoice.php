<?php
class Invoice{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "store";   
	private $invoiceUserTable = 'employee';	
    private $invoiceOrderTable = 'invoice';
	private $invoiceOrderItemTable = 'order_item';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function loginUsers($e_word){
		$sqlQuery = "
			SELECT e_id, e_word, e_fname, e_lname, e_address, e_mobile 
			FROM ".$this->invoiceUserTable." 
			WHERE e_word='".$e_word."'";
        return  $this->getData($sqlQuery);
	}	
	public function checkLoggedIn(){
		if(!$_SESSION['userid']) {
			header("Location:twostep.php");
		}
	}		
	public function saveInvoice($POST) {		
		$sqlInsert = "
			INSERT INTO ".$this->invoiceOrderTable."(e_id, c_mobile, total_before_tax, total_tax, tax_per, total_after_tax) 
			VALUES ('".$POST['userId']."', '".$POST['c_mobile']."', '".$POST['subTotal']."', '".$POST['taxAmount']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "
			INSERT INTO ".$this->invoiceOrderItemTable."(invoice_id, pro_id, pro_name, quantity, price, final_amount) 
			VALUES ('".$lastInsertId."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}       	
	}	
	public function updateInvoice($POST) {
		if($POST['invoice_id']) {	
			$sqlInsert = "
				UPDATE ".$this->invoiceOrderTable." 
				SET c_mobile = '".$POST['c_mobile']."', total_before_tax = '".$POST['subTotal']."', total_tax = '".$POST['taxAmount']."', tax_per = '".$POST['taxRate']."', total_after_tax = '".$POST['totalAftertax']."' WHERE e_id = '".$POST['userId']."' AND invoice_id = '".$POST['invoice_id']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		$this->deleteInvoiceItems($POST['invoice_id']);
		for ($i = 0; $i < count($POST['productCode']); $i++) {			
			$sqlInsertItem = "
				INSERT INTO ".$this->invoiceOrderItemTable."(invoice_id, pro_id, pro_name, quantity, price, final_amount) 
				VALUES ('".$POST['invoice_id']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);			
		}       	
	}
	public function getInvoiceList(){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE e_id = '".$_SESSION['userid']."'";
		return  $this->getData($sqlQuery);
	}	
	public function getInvoice($invoice_id){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE e_id = '".$_SESSION['userid']."' AND invoice_id = '".$invoice_id."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}	
	public function getInvoiceItems($invoice_id){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderItemTable." 
			WHERE invoice_id = '".$invoice_id."'";
		return  $this->getData($sqlQuery);	
	}
	public function deleteInvoiceItems($invoice_id){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderItemTable." 
			WHERE invoice_id = '".$invoice_id."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteInvoice($invoice_id){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderTable." 
			WHERE invoice_id = '".$invoice_id."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteInvoiceItems($invoice_id);	
		return 1;
	}
}
?>