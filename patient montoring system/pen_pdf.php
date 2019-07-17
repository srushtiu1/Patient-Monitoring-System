<?php
include ("connection.php");
$date=date("m");
$pay=0;
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT patient_details.p_id,patient_details.p_fname,patient_details.p_lname,bill.b_date,bill.b_bal,bill.b_no
FROM bill 
JOIN patient_details 
ON bill.b_p_id=patient_details.p_id 
WHERE bill.b_bal>'0'
Order by patient_details.p_fname");
$header = $db_handle->runQuery("SELECT patient_details.p_id,patient_details.p_fname,patient_details.p_lname,bill.b_date,bill.b_bal,bill.b_no
FROM bill 
JOIN patient_details 
ON bill.b_p_id=patient_details.p_id 
WHERE bill.b_bal>'0'
Order by patient_details.p_fname");
//$res = $db_handle->runQuery("select * from patient_details where p_id=$name");
$counter=0;

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,12,"",0);
	$pdf->Cell(30,12,"Outstanding Payment Report",0);
	
$pdf->Ln();
//foreach($header as $heading) {
	$pdf->Cell(15,12,"Sr No",1,'','C');
$pdf->Cell(20,12,"Patient Id",1,'','C');
	$pdf->Cell(55,12,"Name",1,'','C');
	$pdf->Cell(30,12,"Bill Number",1,'','C');
	$pdf->Cell(30,12,"Bill Date",1,'','C');
	$pdf->Cell(40,12,"Balance Amount",1,'','C');
	
//}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	//foreach($row as $column)
	$pdf->Cell(15,12,++$counter,1,'','C');
	$pdf->Cell(20,12,++$row['p_id'],1,'','C');
	$pdf->Cell(55,12,$row['p_fname'] ." ". $row['p_lname'],1,'','C');
	$pdf->Cell(30,12,$row['b_no'],1,'','C');
	$pdf->Cell(30,12,date('d M Y', strtotime($row['b_date'])),1,'','C');
	$pdf->Cell(40,12,$row['b_bal'],1,'','R');
	$pay=$pay+$row['b_bal'];
		
}

$pdf->SetFont('Arial','',12);	
$pdf->Ln();
$pdf->Cell(150,12,"Total Amount",1,'','C');
$pdf->Cell(40,12,$pay,1,'','R');
$pdf->Output();
?>