<?php
include '../koneksi.php';

$kode = $_POST['kode'];
$level = $_POST['level'];
$nama_lengkap = mysqli_escape_string($conn, ucwords($_POST['nama_lengkap']));
$username = mysqli_escape_string($conn, $_POST['username']);
$password = mysqli_escape_string($conn, $_POST['password']);
$email = mysqli_escape_string($conn, $_POST['email']);

$query = mysqli_query($conn, "UPDATE tb_pengguna SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', email = '$email', modified = NOW() WHERE kode = '$kode'");
if($query) {
	if($level == "Mahasiswa") {
		mysqli_query($conn, "UPDATE tb_mahasiswa SET nama_mahasiswa = '$nama_lengkap', email = '$email', modified = NOW() WHERE kode = '$kode'");
	}
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	$string = mysqli_error($conn);
	$pieces = explode(' ', $string);
	$last_word = array_pop($pieces);
	$remove = str_replace("'", "", $last_word);
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0', 'type'=>$remove]);
}
?>