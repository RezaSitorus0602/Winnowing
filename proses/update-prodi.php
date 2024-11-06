<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama_prodi = mysqli_escape_string($conn, ucwords($_POST['nama_prodi']));

$query = mysqli_query($conn, "UPDATE tb_prodi SET nama_prodi = '$nama_prodi', modified = NOW() WHERE id_prodi = '$id'");
if($query) {	
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0']);
}
?>