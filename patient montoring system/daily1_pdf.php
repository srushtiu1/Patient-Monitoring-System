<?php
include ("connection.php");
$date=mysqli_real_escape_string($link,$_POST['date']);
$pay=0;
$amt=0;
$bal=0;
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT payment.* ,bill.*,patient_details.*
from payment
join bill
join patient_details
where payment.pm_date='$date' and payment.pm_b_no=bill.b_no and bill.b_p_id=patient_details.p_id");

//$res = $db_handle->runQuery("select * from patient_details where p_id=$name");
$counter=0;

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);

//foreach($header as $heading) {
	$pdf->Cell(15,12,"Sr No",1,'','C');
	$pdf->Cell(35,12,"Name",1,'','C');
	$pdf->Cell(27,12,"Payment ID",1,'','C');
	//$pdf->Cell(30,12,"Payment Date",1,'','C');
	$pdf->Cell(30,12,"Bill Amount",1,'','C');
	$pdf->Cell(30,12,"Amount Paid",1,'','C');
	$pdf->Cell(32,12,"Balance Amt",1,'','C');
//}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	//foreach($row as $column)
	$pdf->Cell(15,12,++$counter,1,'','C');
	$pdf->Cell(35,12,$row['p_fname'] ." ". $row['p_lname'],1,'','C');
	$pdf->Cell(27,12,$row['pm_id'],1,'','C');
	//$pdf->Cell(30,12,date('d M Y', strtotime($row['pm_date'])),1,'','C');
	$pdf->Cell(30,12,$row['b_amt'],1,'','R');
	$amt=$amt+$row['b_amt'];
	$pdf->Cell(30,12,$row['pm_amt'],1,'','R');
	$pay=$pay+$row['pm_amt'];
	$pdf->Cell(32,12,$row['b_bal'],1,'','R');
	$bal=$bal+$row['b_bal'];
	
}

$pdf->SetFont('Arial','',12);	
$pdf->Ln();
$pdf->Cell(107,12,"Total Amount",1,'','C');
$pdf->Cell(30,12,$amt,1,'','R');
$pdf->Cell(30,12,$pay,1,'','R');
$pdf->Cell(32,12,$bal,1,'','R');

$pdf->Output();
?>