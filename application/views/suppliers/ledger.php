<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('abc');
$pdf->SetTitle('Dharmesh Hardware');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$title=<<<EOD
<h1>Jay Shree Bhauneli Traders & Suppliers</h1>
<h3>Account Ledger</h3>

EOD;
// $title.=date('Y');
$pdf->WriteHtmlCell(0,0,'','',$title,0,1,0,true,'C',true);
foreach ($data2 as $row) {
$table='Account: '.$row['name'].'<br>';
}
foreach ($data3 as $row) {
$table.='From: '.date('d-m-Y', $row['min']).' to '.date('d-m-Y', $row['max']).'<br><br><table style="width:100%; margin:0;"><hr/>';
}
$table .='<tr>
		<th style="width:12%; margin:0;">Date</th>
		<th style="width:7%; margin:0;">Type</th>
		<th style="width:10%; margin:0;">Bill No.</th>
		<th style="width:20%; margin:0;">Particulars</th>
		<th style="width:20%; margin:0;">Narration</th>
		<th style="width:10%; margin:0;">Debit(Rs.)</th>
		<th style="width:11%; margin:0;">Credit(Rs.)</th>
		<th style="width:12%; margin:0;">Balance(Rs.)</th>
		</tr><hr/>';
$no=1;
$total=0;
$tPaid=0;
$tDue=0;
$pre='';
$date='';
$bill_no='';
$debit=0;
$balance=0;
$temp='';
$tmp=0;
$sub=0;
$credit=0;
$td=0;
$crtmp=0;
foreach ($data as $row) {
	$sub=$row['qty']*$row['rate'];
	if ($pre==$row['bill_no']) {
	$date='';
	$bill_no='';
	$sale='';
	$debit='';
	$pre=$row['bill_no'];
	$balance='';
	$credit='';

}else{
	$date=date('d-m-Y', $row['date_time']);
	$bill_no=$row['bill_no'];
	$pre=$row['bill_no'];
	$debit=$row['net_amount'];

	$td=$td+$debit;
	$sale='Purchase';
	$credit=$row['paid_amount'];
	$balance=$tmp+($row['net_amount']-$credit).'&nbsp; Dr';
	$total=$tmp+$row['net_amount'];
	$tmp=$tmp+$balance;
	$crtmp=$crtmp+$credit;
	$grt=$balance+$crtmp;

	
}
$table .='<tr>
		<td >'.$date.'</td>
		<td >'.$sale.'</td>
		<td >'.$bill_no.'</td>
		<td >'.$row['name'].'</td>
		<td >'.$row['qty'].'&nbsp;'.$row['sku'].'&nbsp;@&nbsp;'.$row['rate'].'='.$sub.'</td>
		<td >'.number_format($debit,2).'</td>
		<td >'.number_format($credit,2).'</td>
		<td >'.number_format($balance,2).'</td>

	</tr>
	';
	


}
$table .='<hr/>	<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Total c/o</td>

<td >'.number_format($td,2).'</td>
<td>'.number_format($crtmp,2).' </td>


</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td><b>Debit Balance</b></td>

<td ></td>
<td><b>'.number_format($balance,2).'</b> </td><hr/>

</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Grand Total</td>

<td >'.number_format($td,2).'</td>
<td>'.number_format($grt,2).' </td><hr/>

</tr>
</table>';

$footer='*Note: Service charges and VAT is included.';




$pdf->WriteHtmlCell(0,0,'','',$table,0,1,0,true,'C',true);
$pdf->WriteHtmlCell(0,0,'','',$table2,0,1,0,true,'C',true);
$pdf->WriteHtmlCell(0,0,'','',$footer,0,1,0,true,'C',true);


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();
//Close and output PDF document
$pdf->Output('report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
