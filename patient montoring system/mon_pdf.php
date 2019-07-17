<?php
include ("connection.php");
$date=date("m");
$pay=0;
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT payment.*,bill.*,patient_details.* 
FROM payment Join bill join patient_details WHERE (MONTH(pm_date)=$date and payment.pm_b_no=bill.b_no and bill.b_p_id=patient_details.p_id)");
$header = $db_handle->runQuery("SELECT payment.*,bill.*,patient_details.* 
FROM payment Join bill join patient_details WHERE (MONTH(pm_date)=$date and payment.pm_b_no=bill.b_no and bill.b_p_id=patient_details.p_id)");
//$res = $db_handle->runQuery("select * from patient_details where p_id=$name");
$counter=0;

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
//$pdf->setTitle('Name: '.$r["p_fname"].' '.$r["p_mname"].' '.$r["p_lname"]);
$pdf->Cell(20,12,"",0);
	$pdf->Cell(30,12,"Monthly Report",0);
	$pdf->Cell(40,12,"",0);
	$pdf->Cell(50,12,"Month: ".date('F'),0);
	$pdf->Cell(30,12,"Year: ".date('Y'),0);
$pdf->Ln();

//foreach($header as $heading) {
	$pdf->Cell(20,12,"Sr No",1,'','C');
	$pdf->Cell(60,12,"Name",1,'','C');
	$pdf->Cell(30,12,"Bill Number",1,'','C');
	$pdf->Cell(30,12,"Payment Date",1,'','C');
	$pdf->Cell(40,12,"Payment Amount",1,'','C');
	
//}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	//foreach($row as $column)
	$pdf->Cell(20,12,++$counter,1,'','C');
	$pdf->Cell(60,12,$row['p_fname'] ." ". $row['p_lname'],1,'','C');
	$pdf->Cell(30,12,$row['pm_b_no'],1,'','C');
	$pdf->Cell(30,12,date('d M Y', strtotime($row['pm_date'])),1,'','C');
	$pdf->Cell(40,12,$row['pm_amt'],1,'','R');
	$pay=$pay+$row['pm_amt'];
		
}

$pdf->SetFont('Arial','',12);	
$pdf->Ln();
$pdf->Cell(140,12,"Total Amount",1,'','C');
$pdf->Cell(40,12,$pay,1,'','R');
$pdf->Output();
?>