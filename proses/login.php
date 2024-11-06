<?php
include '../koneksi.php';

$username = mysqli_escape_string($conn, $_POST['username']);
$password = mysqli_escape_string($conn, $_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE BINARY username = '$username' AND BINARY password = '$password'");
$cek = mysqli_num_rows($query);

if($cek > 0) {
	$row = mysqli_fetch_array($query);	
	$_SESSION['username'] = $row['username'];
	$_SESSION['userid'] = $row['id_pengguna'];
	$_SESSION['nama'] = $row['nama_lengkap'];
	$_SESSION['level'] = $row['level'];
	$ip_address = getUserIP();
	$browser = get_client_browser();
	$peramban_web = $_SERVER['HTTP_USER_AGENT'];
	$sistem_operasi = php_uname();
	$keterangan = $row['nama_lengkap']." telah masuk ke dalam aplikasi dengan alamat ip yaitu ".$ip_address." menggunakan browser ".$browser." dan sistem operasi yang digunakan adalah ".$sistem_operasi."";
	mysqli_query($conn, "INSERT INTO tb_aktivitas(ip, browser, peramban_web, sistem_operasi, keterangan, created, modified) VALUES('$ip_address', '$browser', '$peramban_web', '$sistem_operasi', '$keterangan', NOW(), NOW())");
	echo json_encode(['message'=>'successfully logged in as admin', 'status'=>'1', 'nama'=>$row['nama_lengkap']]);
}else {
	echo json_encode(['message'=>'login failed, account not found', 'status'=>'0']);
}
?>