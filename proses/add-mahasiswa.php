<?php
include '../koneksi.php';

$hasil = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_mahasiswa");
$data = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];
$noUrut = (int) substr($kode, 2, 4);
$noUrut++;
$char = "MH";
$kode = $char . sprintf("%04s", $noUrut);

$nim = $_POST['nim'];
$fk_prodi = $_POST['fk_prodi'];
$nama_mahasiswa = mysqli_escape_string($conn, ucwords($_POST['nama_mahasiswa']));
$HP = $_POST['HP'];
$email = $_POST['email'];
$tempat_lahir = mysqli_escape_string($conn, ucwords($_POST['tempat_lahir'])); 
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];

$cek1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'"));
$cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE HP = '$HP'"));
$cek3 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE email = '$email'"));

if($cek1 > 0) {
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'2']);
}else if($cek2 > 0) {
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'3']);
}else if($cek3 > 0) {
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'4']);
}else {
	$query = mysqli_query($conn, "INSERT INTO tb_mahasiswa(kode, nim, fk_prodi, nama_mahasiswa, HP, email, tempat_lahir, jenis_kelamin, tanggal_lahir, alamat, created, modified) VALUES('$kode', '$nim', '$fk_prodi', '$nama_mahasiswa', '$HP', '$email', '$tempat_lahir', '$jenis_kelamin', '$tanggal_lahir', '$alamat', NOW(), NOW())");
	if($query) {
		mysqli_query($conn, "INSERT INTO tb_pengguna(kode, email, nama_lengkap, username, password, level, created, modified, HP) VALUES('$kode', '$email', '$nama_mahasiswa', '$nim', '$nim', 'Mahasiswa', NOW(), NOW())");
		echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
	}else {
		echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0']);
	}
}
?>