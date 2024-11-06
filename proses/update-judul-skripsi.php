<?php
include '../koneksi.php';

$id = $_POST['id'];
$fk_mahasiswa = $_POST['fk_mahasiswa'];
$judul = mysqli_escape_string($conn, ucwords($_POST['judul']));

$query = mysqli_query($conn, "UPDATE tb_judul_skripsi SET fk_mahasiswa = '$fk_mahasiswa', judul = '$judul', modified = NOW() WHERE id_judul_skripsi = '$id'");
if($query) {	
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0']);
}
?>