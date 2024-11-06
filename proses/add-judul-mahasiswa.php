<?php
include '../koneksi.php';

if($_SESSION['level'] == "Mahasiswa") {

	$hasil = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_judul_mahasiswa");
	$data = mysqli_fetch_array($hasil);
	$kode = $data['maxKode'];
	$noUrut = (int) substr($kode, 2, 4);
	$noUrut++;
	$char = "JM";
	$kode = $char . sprintf("%04s", $noUrut);

	$fk_mahasiswa = $_POST['fk_mahasiswa'];
	$judul = mysqli_escape_string($conn, ucwords($_POST['judul']));

	$cek1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_judul_mahasiswa WHERE fk_mahasiswa = '$fk_mahasiswa'"));
	$cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_judul_mahasiswa WHERE judul = '$judul'"));
	$cek3 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_judul_skripsi WHERE fk_mahasiswa = '$fk_mahasiswa'"));

	if($cek1 == 5) {
		echo json_encode(['message'=>'failed to save data', 'status'=>'2']);
	}else if($cek2 > 0) {
		echo json_encode(['message'=>'failed to save data', 'status'=>'3']);
	}else if($cek3 > 0) {
		echo json_encode(['message'=>'failed to save data', 'status'=>'4']);
	}else {
		$query = mysqli_query($conn, "INSERT INTO tb_judul_mahasiswa(kode, fk_mahasiswa, judul, created, modified) VALUES('$kode', '$fk_mahasiswa', '$judul', NOW(), NOW())");
		if($query) {
			echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
		}else {
			echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0']);
		}
	}	
}else {
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}
?>