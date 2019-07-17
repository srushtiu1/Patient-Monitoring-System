<?php
include ("connection.php");
$name = mysqli_real_escape_string($link,$_POST['id']);
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT payment.*,patient_details.p_fname,patient_details.p_lname,bill.*
FROM payment 
JOIN bill 
join patient_details
ON (bill.b_no=payment.pm_b_no AND bill.b_p_id=$name)
where bill.b_p_id=p_id");
$header = $db_handle->runQuery("SELECT payment.*,patient_details.p_fname,patient_details.p_lname,bill.*
FROM payment 
JOIN bill 
join patient_details
ON (bill.b_no=payment.pm_b_no AND bill.b_p_id=$name)
where bill.b_p_id=p_id");
$res = $db_handle->runQuery("select * from patient_details where p_id=$name");
$counter=0;
$pay=0;
$amt=0;
$bal=0;
require('fpdf/fpdf.php');
$pdf = new FPDF();
//$pdf->Ln(40);
$pdf->AddPage();
//$pdf->AliasNbPages();

//$pdf->Line(50, 45, 210-50, 45); // 50mm from each edge
$pdf->SetFont('Arial','B',12);
foreach($res as $r)
//$pdf->setTitle('Name: '.$r["p_fname"].' '.$r["p_mname"].' '.$r["p_lname"]);
$pdf->Text(10,45,'Name: '.$r["p_fname"].' '.$r["p_mname"].' '.$r["p_lname"]);
$pdf->Ln();

	$pdf->Cell(20,12,"Sr No",1,'','C');
	$pdf->Cell(27,12,"Payment ID",1,'','C');
	$pdf->Cell(30,12,"Bill Number",1,'','C');
	$pdf->Cell(30,12,"Payment Date",1,'','C');
	$pdf->Cell(30,12,"Bill Amount",1,'','C');
	$pdf->Cell(30,12,"Amount Paid",1,'','C');
	$pdf->Cell(32,12,"Balance Amt",1,'','C');

foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	//foreach($row as $column)
	$pdf->Cell(20,12,++$counter,1,'','C');
	$pdf->Cell(27,12,$row['pm_id'],1,'','C');
	$pdf->Cell(30,12,$row['pm_b_no'],1,'','C');
	$pdf->Cell(30,12,date('d M Y', strtotime($row['pm_date'])),1,'','C');
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