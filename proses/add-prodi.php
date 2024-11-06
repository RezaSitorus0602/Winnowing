<?php
include '../koneksi.php';

$hasil = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_prodi");
$data = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];
$noUrut = (int) substr($kode, 2, 4);
$noUrut++;
$char = "PR";
$kode = $char . sprintf("%04s", $noUrut);

$nama_prodi = mysqli_escape_string($conn, ucwords($_POST['nama_prodi']));

$query = mysqli_query($conn, "INSERT INTO tb_prodi(kode, nama_prodi, created, modified) VALUES('$kode', '$nama_prodi', NOW(), NOW())");
if($query) {
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0']);
}
?>