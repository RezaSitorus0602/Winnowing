<?php
date_default_timezone_set('Asia/Jakarta');
require_once('assets/plugins/tcpdf/tcpdf.php');

$pdf = new TCPDF('L','mm',array(300,260));
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Universitas Sebelas Maret');
$pdf->SetTitle('Laporan Judul Mahasiswa');
$pdf->SetSubject('Judul Mahasiswa');
$pdf->SetKeywords('TCPDF, PDF, Judul Mahasiswa, Laporan');
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
$pdf->Write(0, 'Laporan Judul Mahasiswa', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 15);
$pdf->SetFont('helvetica', '', 10);

function fetch_data() {
	include 'koneksi.php';
	if($_POST['kode'] == "perbulan") {
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];

		$sql = "SELECT jm.*, mh.*, pr.* FROM tb_judul_mahasiswa jm INNER JOIN tb_mahasiswa mh ON jm.fk_mahasiswa = mh.id_mahasiswa INNER JOIN tb_prodi pr ON mh.fk_prodi = pr.id_prodi WHERE jm.created LIKE '$tahun-$bulan%' ORDER BY mh.nim ASC";
		$result = mysqli_query($conn, $sql);
		$cek = mysqli_num_rows($result);
		if($cek > 0) {
			$output = '';
			$no = 1;
			while($row = mysqli_fetch_array($result)) {   
				$output .= '<tr style="font-size:12px;">
				<td align="center">'.$no++.'</td>
				<td align="center">'.$row['nim'].'</td>
				<td align="center">'.$row['nama_mahasiswa'].'</td>
				<td align="center">'.$row['nama_prodi'].'</td>
				<td align="center">'.$row['judul'].'</td>
				</tr>';
			}
			return $output;
		}else {
			echo "<script>alert('Data tidak ditemukan');window.location.href='laporan-judul-mahasiswa';</script>";
		}
	}else if($_POST['kode'] == "pertanggal") {
		$from = $_POST['from'];
		$to = $_POST['to'];

		$sql = "SELECT jm.*, mh.*, pr.* FROM tb_judul_mahasiswa jm INNER JOIN tb_mahasiswa mh ON jm.fk_mahasiswa = mh.id_mahasiswa INNER JOIN tb_prodi pr ON mh.fk_prodi = pr.id_prodi WHERE date(jm.created) BETWEEN '$from' AND '$to' ORDER BY mh.nim ASC";
		$result = mysqli_query($conn, $sql);
		$cek = mysqli_num_rows($result);
		if($cek > 0) {
			$output = '';
			$no = 1;
			while($row = mysqli_fetch_array($result)) {   
				$output .= '<tr style="font-size:12px;">
				<td align="center">'.$no++.'</td>
				<td align="center">'.$row['nim'].'</td>
				<td align="center">'.$row['nama_mahasiswa'].'</td>
				<td align="center">'.$row['nama_prodi'].'</td>
				<td align="center">'.$row['judul'].'</td>
				</tr>';
			}
			return $output;
		}else {
			echo "<script>alert('Data tidak ditemukan');window.location.href='laporan-judul-mahasiswa';</script>";
		}
	}else {
		echo "<script>alert('Data tidak ditemukan');window.location.href='laporan-judul-mahasiswa';</script>";
	}
}

$content  = '';  
$content .= ' 
<br><br><table border="1">  
<tr style="background-color:orange;color:#fff;font-size:12px;">
<th align="center" style="width: 5%;"><b>No</b></th>
<th align="center" style="width: 15%;"><b>NIM</b></th>
<th align="center" style="width: 20%;"><b>Nama</b></th>
<th align="center" style="width: 20%;"><b>Prodi</b></th>
<th align="center" style="width: 40%;"><b>Judul</b></th>
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
$pdf->Output('Laporan Judul Mahasiswa.pdf', 'I');
?>