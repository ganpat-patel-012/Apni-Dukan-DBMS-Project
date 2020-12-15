 <?php 

session_start();
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
function fetch_details()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "store");  
      $a = $_GET['invoice_id'];
      $sql = "SELECT invoice_id,invoice_date,CONCAT(e.e_fname, ' ', e.e_lname) AS ename,CONCAT(c.c_fname, ' ', c.c_lname) AS cname,e.e_id,c.c_id FROM print p,customer c,employee e where p.e_id=e.e_id and p.c_mobile=c.c_mobile and invoice_id=$a "; 
      $id = $_REQUEST['invoice_id'];
      echo $id;
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td> '.$row["invoice_id"].'</td> 
                          <td> '.$row["invoice_date"].'</td>
                          <td>'.$row["cname"].' - '.$row["c_id"].'</td>  
                          <td> '.$row["ename"].' - '.$row["e_id"].'</td>   
                     </tr>  
                          '; 
          break;
          
      }  
      return $output;  
 } 
 function fetch_product()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "store");  
      $a = $_GET['invoice_id'];
      $sql = "SELECT * FROM print where invoice_id=$a "; 
      $id = $_REQUEST['invoice_id'];
      echo $id;
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td> '.$row["pro_id"].'</td> 
                          <td>'.$row["pro_name"].'</td>
                          <td> '.$row["quantity"].'</td>  
                          <td> '.$row["price"].'</td>  
                          <td> '.$row["final_amount"].'</td>  
                     </tr>  
                          '; 
          
      }  
      return $output;  
 } 
function fetch_total()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "store");  
      $a = $_GET['invoice_id'];
      $sql = "SELECT * FROM print where invoice_id=$a "; 
      $id = $_REQUEST['invoice_id'];
      echo $id;
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td> '.$row["total_before_tax"].'</td> 
                          <td> '.$row["total_tax"].'</td>
                          <td> '.$row["tax_per"].' %</td>  
                          <td> '.$row["total_after_tax"].'</td>    
                     </tr>  
                          ';
          break;
          
      }  
      return $output;  
 } 
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Apani Dukan - Invoice");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = ''; 

$content .= ' 
      <h2 align="center">Apani Dukan - Invoice Number : '.$_GET['invoice_id'].'</h2>
      <p align="center">CSE Department, SMVITM Bantkal (Udupi) - 574115<br>Contact us : 9672836721  Mail us : help.apnidukan@gmail.com </p><hr>
      <h3 align="left">Details :</h3><br /><br />
      <table border="1" cellspacing="0" cellpadding="5"> 
      
           <tr>   
                <th>Invoice ID</th>  
                <th>Invoice Date</th>  
                <th>Customer Name & ID</th>  
                <th>Employee Name & ID</th>   
           </tr> 
           
      ';  
      $content .= fetch_details(); 

      $content .= '</table>';

      $content .= '<br />  
      <h3 align="left">Purchased Products :</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5"> 
      
           <tr>   
                <th>Product ID</th>  
                <th>Product Name</th>  
                <th>Quantity</th>  
                <th>Price</th>  
                <th>Total</th>  
           </tr> 
           
      ';  
      $content .= fetch_product(); 

      $content .= '</table>';
$content .= '  <br>
      <h3 align="left">Payment Summary :</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5"> 
           <tr> 
                <th>Sub Total</th>  
                <th>Total Before Tax</th>  
                <th>Tax Rate</th>  
                <th>Final Ammount</th>   
           </tr> 
           
      ';  
$content .= fetch_total(); 
$content .= '</table>';
      $obj_pdf->writeHTML($content);
ob_end_clean();
      $obj_pdf->Output('Invoice-'.$_GET['invoice_id'].'.pdf', 'I');  
 ?>  