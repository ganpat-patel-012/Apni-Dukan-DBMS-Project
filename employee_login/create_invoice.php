<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['c_mobile']) && $_POST['c_mobile']) {	
	$invoice->saveInvoice($_POST);
	header("Location:invoice_list.php");	
}
?>

<?php

$connect = new PDO("mysql:host=localhost;dbname=store", "root", "");
function productid($connect)
{ 
 $output = '';
 $query = "SELECT * FROM product";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["pro_id"].'">'.$row["pro_id"].'</option>';
 }
 return $output;
}
?>

<?php
$connect = new PDO("mysql:host=localhost;dbname=store", "root", "");
function productname($connect)
{ 
 $output = '';
 $query = "SELECT * FROM product";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["pro_name"].'">'.$row["pro_name"].'</option>';
 }
 return $output;
}
?>

<?php
$connect = new PDO("mysql:host=localhost;dbname=store", "root", "");
function price($connect)
{ 
 $output = '';
 $query = "SELECT * FROM product";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["price"].'">'.$row["price"].'</option>';
 }
 return $output;
}
?>

<?php
$conn = new PDO("mysql:host=localhost;dbname=store", "root", "");

$sql="select pro_id,pro_name,price from product order by price";
$sql1="select c_mobile from customer c";

try
{
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $results=$stmt->fetchAll();
    
    $stmt1=$conn->prepare($sql1);
    $stmt1->execute();
    $mobile=$stmt1->fetchAll();
}
catch(Execption $ex)
{
    echo($ex->getMessage());
}
?>

<!DOCTYPE html>
<html>
<title>New Invoice</title>
<link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="assets/img/images.png">
<div class="container cosssssntent-invoice">
	<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h1><strong>Invoice Pannel</strong></h1>
					<a href="invoice_list.php"><h4><strong>&#60;&#60;&#60; Back to List</strong></h4></a>	
				</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3><strong>Employee Details:</strong></h3>
					<strong><?php echo $_SESSION['user']; ?><br>	
					<?php echo $_SESSION['e_address']; ?><br>	
					<?php echo $_SESSION['e_mobile']; ?><br></strong>	
				</div>      		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
					<h3><strong>Customer Details:</strong></h3>
					<div class="form-group">
                        <select type="text"  name="c_mobile" id="c_mobile" class="form-control" autocomplete="off">
                                <option value="">--- Select Customer Mobile ---</option>
                                <?php foreach ($mobile as $output){?><option><?php echo $output{"c_mobile"};?></option>
                                <?php } ?>
                                </select>
					</div>
					<br>
                    <br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th width="15%">Product No</th>
							<th width="38%">Product Name</th>
							<th width="15%">Quantity</th>
							<th width="15%">Price</th>								
							<th width="15%">Total</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							<td><select type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off">
                                <option value="">-Select Product-</option>
                                <?php foreach ($results as $output){?><option><?php echo $output{"pro_id"};?></option>
                                <?php } ?>
                                </select></td>
							<td><select type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off">
                                <option value="">---Select Product Name---</option>
                                <?php foreach ($results as $output){?><option><?php echo $output{"pro_name"};?></option>
                                <?php } ?>
                                </select></td>			
							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
							<td><select type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off">
                                <option value="" >--Select Price--</option>
                                <?php foreach ($results as $output){?><option><?php echo $output{"price"};?></option>
                                <?php } ?>
                                </select>
                                
                            </td>
							<td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
						</tr>						
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
					<button class="btn btn-success" id="addRows" type="button">+ Add More</button>
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<br>
					<div class="form-group">
						<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">						
					</div>
					
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">₹</div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>
						<div class="form-group">
							<label>Tax Rate: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tax Amount: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">₹</div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
							</div>
						</div>							
						<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">₹</div>
								<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
					</span>
				</div>
			</div>
			<div class="clearfix"></div>		      	
		</div>
	</form>			
</div>
</html>
    
<script>
 $(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
        htmlRows += '<td><select type="text" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off"><option value="">-Select Product-</option><?php echo productid($connect); ?></select></td>';  
        htmlRows += '<td><select type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"><option value="">---Select Product Name---</option><?php echo productname($connect); ?></select></td>'; 
		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>'; 
        htmlRows += '<td><select type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"><option value="">---Select Product Name---</option><?php echo price($connect); ?></select></td>';
		htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';  
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#taxRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {
			$('#amountDue').val(totalAftertax);
		}	
	});	
	$(document).on('click', '.deleteInvoice', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				dataType: "json",
				data:{id:id, action:'delete_invoice'},				
				success:function(response) {
					if(response.status == 1) {
						$('#'+id).closest("tr").remove();
					}
				}
			});
		} else {
			return false;
		}
	});
});	
function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount));	
	var taxRate = $("#taxRate").val();
	var subTotal = $('#subTotal').val();	
	if(subTotal) {
		var taxAmount = subTotal*taxRate/100;
		$('#taxAmount').val(taxAmount);
		subTotal = parseFloat(subTotal)+parseFloat(taxAmount);
		$('#totalAftertax').val(subTotal);		
		var amountPaid = $('#amountPaid').val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {		
			$('#amountDue').val(subTotal);
		}
	}
}
</script>