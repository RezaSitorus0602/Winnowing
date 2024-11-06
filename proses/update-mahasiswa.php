<?php
include '../koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$nim = $_POST['nim'];
$fk_prodi = $_POST['fk_prodi'];
$nama_mahasiswa = mysqli_escape_string($conn, ucwords($_POST['nama_mahasiswa']));
$HP = $_POST['HP'];
$email = $_POST['email'];
$tempat_lahir = mysqli_escape_string($conn, ucwords($_POST['tempat_lahir'])); 
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];

$query = mysqli_query($conn, "UPDATE tb_mahasiswa SET nim = '$nim', fk_prodi = '$fk_prodi', nama_mahasiswa = '$nama_mahasiswa', HP = '$telepHPon', email = '$email', tempat_lahir = '$tempat_lahir', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', modified = NOW() WHERE id_mahasiswa = '$id'");
if($query) {
	mysqli_query($conn, "UPDATE tb_pengguna SET nama_lengkap = '$nama_mahasiswa', username = '$nim', password = '$nim', email = '$email', modified = NOW() WHERE kode = '$kode'");
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	$string = mysqli_error($conn);
	$pieces = explode(' ', $string);
	$last_word = array_pop($pieces);
	$remove = str_replace("'", "", $last_word);
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0', 'type'=>$remove]);
}
?>