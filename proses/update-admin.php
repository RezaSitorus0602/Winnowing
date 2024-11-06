<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama_lengkap = mysqli_escape_string($conn, ucwords($_POST['nama_lengkap']));
$username = mysqli_escape_string($conn, $_POST['username']);
$password = mysqli_escape_string($conn, $_POST['password']);
$email = $_POST['email'];
$level = $_POST['level'];

$query = mysqli_query($conn, "UPDATE tb_pengguna SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', email = '$email', level = '$level', modified = NOW() WHERE id_pengguna = '$id'");
if($query) {	
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	$string = mysqli_error($conn);
	$pieces = explode(' ', $string);
	$last_word = array_pop($pieces);
	$remove = str_replace("'", "", $last_word);
	echo json_encode(['message'=>mysqli_error($conn), 'status'=>'0', 'type'=>$remove]);
}
?>