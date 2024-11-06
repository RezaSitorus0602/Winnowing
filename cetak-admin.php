<?php
date_default_timezone_set('Asia/Jakarta');
require_once('assets/plugins/tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Universitas Sebelas Maret');
$pdf->SetTitle('Laporan Admin');
$pdf->SetSubject('Admin');
$pdf->SetKeywords('TCPDF, PDF, Admin, Laporan');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

$pdf->SetFont('helvetica', 'B', 20);
$pdf->AddPage();
$pdf->SetY(40);
$pdf->Write(0, 'Laporan Admin', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 15);
$pdf->SetFont('helvetica', '', 10);

function fetch_data() {
	include 'koneksi.php';
	$output = '';
	$sql = "SELECT * FROM tb_pengguna WHERE level = 'Admin' ORDER BY kode ASC";
	$result = mysqli_query($conn, $sql);
	$no = 1;
	while($row = mysqli_fetch_array($result)) {   
		$output .= '<tr style="font-size:12px;">
		<td align="center">'.$no++.'</td>
		<td align="center">'.$row['kode'].'</td>
		<td align="center">'.$row['nama_lengkap'].'</td>
		</tr>';
	}
	return $output;
}

$content  = '';  
$content .= ' 
<br><br><table border="1">  
<tr style="background-color:orange;color:#fff;font-size:12px;">
<th align="center" style="width: 5%;"><b>No</b></th>
<th align="center" style="width: 25%;"><b>Kode</b></th>
<th align="center" style="width: 70%;"><b>Nama Lengkap</b></th>
</tr>';     
$content .= fetch_data(); 
$content .= '
</table>';

$pdf->writeHTML($content, true, false, false, false, '');

$tbl2 = '<br><br><table border="0px" cellpadding="2" cellspacing="0">
<tr style="text-align:center;" nobr="true">
<td style="width:60%;"></td>
<td style="width:40%;">
Kabupaten Banjarbaru, '.tglIndonesia(date('d F Y')).'<br><br><br><br><u><b>Admin</b></u>
</td>
</tr>
</table>';

$pdf->writeHTML($tbl2, true, false, false, false, '');
$pdf->Output('Laporan Admin.pdf', 'I');
?>