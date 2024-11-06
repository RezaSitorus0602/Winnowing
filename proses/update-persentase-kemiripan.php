<?php
include '../koneksi.php';

$persentase = $_POST['persentase'];

$query = mysqli_query($conn, "UPDATE tb_konfigurasi SET persentase = '$persentase'");
if($query) {
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0']);
}
?>