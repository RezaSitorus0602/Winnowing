<?php
include '../koneksi.php';

$hasil = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_pengguna WHERE level != 'Mahasiswa'");
$data = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];
$noUrut = (int) substr($kode, 2, 4);
$noUrut++;
$char = "AD";
$kode = $char . sprintf("%04s", $noUrut);

$nama_lengkap = mysqli_escape_string($conn, ucwords($_POST['nama_lengkap']));
$username = mysqli_escape_string($conn, $_POST['username']);
$password = mysqli_escape_string($conn, $_POST['password']);
$email = $_POST['email'];
$level = $_POST['level'];

$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username = '$username'"));

if($cek > 0) {
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'2']);
}else {
	$query = mysqli_query($conn, "INSERT INTO tb_pengguna(kode, nama_lengkap, username, password, email, level, created, modified) VALUES('$kode', '$nama_lengkap', '$username', '$password', '$email', '$level', NOW(), NOW())");
	if($query) {
		echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
	}else {
		echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0']);
	}
}
?>