<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include("koneksi.php");
// menghubungkan dengan library excel reader
include "excel_reader2.php";
error_reporting(0);
?>

<?php
// upload file xls
$target = basename($_FILES['fileimport']['name']) ;
move_uploaded_file($_FILES['fileimport']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['fileimport']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['fileimport']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
$noUrut = 0;

for ($i=2; $i<=$jumlah_baris; $i++){
// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nim = $data->val($i, 1);
	$nama_prodi = $data->val($i, 3);
	$kueri = mysqli_query($conn, "SELECT * FROM tb_prodi WHERE nama_prodi='$nama_prodi'");
	$tampil = mysqli_fetch_array($kueri);
	$fk_prodi = $tampil['id_prodi'];
	$nama_mahasiswa = $data->val($i, 2);
	$HP = $data->val($i, 6);
	$email = $data->val($i, 7);
	$tempat_lahir = $data->val($i, 8); 
	$jenis_kelamin = $data->val($i, 4);
	$tanggal_lahir = $data->val($i, 9);
	$alamat = $data->val($i, 5);

	$hasil = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_mahasiswa");
	$dataxxx = mysqli_fetch_array($hasil);
	$kode = $dataxxx['maxKode'];
	$noUrut = (int) substr($kode, 2, 4);
	$noUrut++;
	$char = "MH";
	$kode = $char . sprintf("%04s", $noUrut);



	if($nim != "" && $fk_prodi != "" && $nama_mahasiswa != "" && $HP != "" && $email != "" && $tempat_lahir != "" && $jenis_kelamin != ""){
		if(strlen($nim) >= 12) {
		// input data ke database (table data_pegawai)
			mysqli_query($conn, "INSERT INTO tb_pengguna(kode, email, nama_lengkap, username, password, level, created, modified) VALUES('$kode', '$email', '$nama_mahasiswa', '$nim', '$nim', 'Mahasiswa', NOW(), NOW())");
    	// $queryInsert = mysqli_query($conn, "INSERT INTO tb_mahasiswa SET kode='$kode', nim='$nim', fk_prodi='$fk_prodi', nama_mahasiswa='$nama_mahasiswa', telepon='$telepon', email='$email', tempat_lahir='$tempat_lahir', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', alamat='$alamat', created=NOW(),modified=NOW()");
			$query = mysqli_query($conn, "INSERT INTO tb_mahasiswa(kode, nim, fk_prodi, nama_mahasiswa, telepon, email, tempat_lahir, jenis_kelamin, tanggal_lahir, alamat, created, modified) VALUES('$kode', '$nim', '$fk_prodi', '$nama_mahasiswa', '$telepon', '$email', '$tempat_lahir', '$jenis_kelamin', '$tanggal_lahir', '$alamat', NOW(), NOW())");
			$berhasil++;
		}
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['fileimport']['name']);

// alihkan halaman ke index.php
// header("location:index.php?berhasil=$berhasil");
echo "<script> alert('Data Berhasil Di Import'); location.href='mahasiswa' </script>";
exit;
?>