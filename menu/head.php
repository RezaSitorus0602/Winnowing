<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<meta name="author" content="Universitas Sebelas Maret">
<meta name="description" content="Aplikasi Penerapan Algoritma Winnowing Untuk Mendeteksi Kemiripan Teks Pada Judul Skripsi">
<meta name="keywords" content="winnowing, php, mysql, algoritma winnowing, Universitas Sebelas Maret">
<title>Algoritma Winnowing</title>
<link rel="shortcut icon" href="assets/images/favicon.png">
<link rel="stylesheet" href="assets/plugins/myplugins/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/myplugins/fontawesome/css/all.css">
<link rel="stylesheet" href="assets/plugins/jqvmap/dist/jqvmap.min.css">
<link rel="stylesheet" href="assets/plugins/weathericons/css/weather-icons.min.css">
<link rel="stylesheet" href="assets/plugins/weathericons/css/weather-icons-wind.min.css">
<link rel="stylesheet" href="assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css">
<link rel="stylesheet" href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="assets/plugins/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="assets/plugins/selectric/public/selectric.css">
<link rel="stylesheet" href="assets/plugins/chocolat/dist/css/chocolat.css">
<link rel="stylesheet" href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="assets/plugins/dropzone/dist/min/dropzone.min.css">
<link rel="stylesheet" href="assets/dist/css/style.css">
<link rel="stylesheet" href="assets/dist/css/components.css">
<?php
if (isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
	$syntax = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$userid'");
	$online = mysqli_fetch_array($syntax);
	if ($online['level'] == "Mahasiswa") {
		$kodeMHS = $online['kode'];
		$queryMHS = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE kode = '$kodeMHS'");
		$rowMHS = mysqli_fetch_array($queryMHS);
	}
} else {
	header("Location: index");
}
?>