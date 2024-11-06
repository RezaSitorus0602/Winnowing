<?php
include '../koneksi.php';
include "excel_reader2.php";

$target = basename($_FILES['file']['name']) ;
move_uploaded_file($_FILES['file']['tmp_name'], $target);

chmod($_FILES['file']['name'],0777);

$data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);

$jumlah_baris = $data->rowcount($sheet_index = 0);

$berhasil = 0;
$noUrut = 0;

for($i = 2; $i <= $jumlah_baris; $i++){
	$nama_kecil = strtolower($data->val($i, 2));
	$prodi_kecil = strtolower($data->val($i, 3));
	$judul_kecil = strtolower($data->val($i, 4));

	$nim = $data->val($i, 1);
	$nama = ucwords($nama_kecil);
	$prodi = ucwords($prodi_kecil);
	$judul = ucwords($judul_kecil);

	if($nim != "" && $nama != "" && $prodi != "" && $judul != "") {
		$query1 = mysqli_query($conn, "SELECT * FROM tb_prodi WHERE nama_prodi = '$prodi'");
		$cek1 = mysqli_num_rows($query1);

		if($cek1 > 0) {
			$row1 = mysqli_fetch_array($query1);
			$prodi_fix = $row1['id_prodi'];
		}else {
			$getProdi = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_prodi");
			$dataProdi = mysqli_fetch_array($getProdi);
			$kodeProdi = $dataProdi['maxKode'];
			$noUrutProdi = (int) substr($kodeProdi, 2, 4);
			$noUrutProdi++;
			$charProdi = "PR";
			$kodeProdi = $charProdi . sprintf("%04s", $noUrutProdi);

			mysqli_query($conn, "INSERT INTO tb_prodi(kode, nama_prodi, created, modified) VALUES('$kodeProdi', '$prodi', NOW(), NOW())");

			$queryGetProdi = mysqli_query($conn, "SELECT * FROM tb_prodi ORDER BY id_prodi DESC LIMIT 1");
			$rowGetProdi = mysqli_fetch_array($queryGetProdi);

			$prodi_fix = $rowGetProdi['id_prodi'];
		}

		$query2 = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
		$cek2 = mysqli_num_rows($query2);

		if($cek2 > 0) {
			$row2 = mysqli_fetch_array($query2);
			$nim_fix = $row2['id_mahasiswa'];
		}else {
			$getMahasiswa = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_mahasiswa");
			$rowMahasiswa = mysqli_fetch_array($getMahasiswa);
			$kodeMahasiswa = $rowMahasiswa['maxKode'];
			$noUrutMahasiswa = (int) substr($kodeMahasiswa, 2, 4);
			$noUrutMahasiswa++;
			$charMahasiswa = "MH";
			$kodeMahasiswa = $charMahasiswa . sprintf("%04s", $noUrutMahasiswa);

			mysqli_query($conn, "INSERT INTO tb_mahasiswa(kode, nim, nama_mahasiswa, fk_prodi, created, modified) VALUES('$kodeMahasiswa', '$nim', '$nama', '$prodi_fix', NOW(), NOW())");

			mysqli_query($conn, "INSERT INTO tb_pengguna(kode, nama_lengkap, username, password, level, created, modified) VALUES('$kodeMahasiswa', '$nama', '$nim', '$nim', 'Mahasiswa', NOW(), NOW())");

			$queryGetMahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa ORDER BY id_mahasiswa DESC LIMIT 1");
			$rowGetMahasiswa = mysqli_fetch_array($queryGetMahasiswa);

			$nim_fix = $rowGetMahasiswa['id_mahasiswa'];
		}

		$getJudul = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_judul_mahasiswa");
		$rowJudul = mysqli_fetch_array($getJudul);
		$kodeJudul = $rowJudul['maxKode'];
		$noUrutJudul = (int) substr($kodeJudul, 2, 4);
		$noUrutJudul++;
		$charJudul = "JM";
		$kodeJudul = $charJudul . sprintf("%04s", $noUrutJudul);

		$arraySkripsi = array();
		$kalimat = array();

		$kalimat[0] = $judul;

		$no = 1;
		$noKalimat = 1;
		$querySkripsi = mysqli_query($conn, "SELECT * FROM tb_judul_skripsi");
		while($rowSkripsi = mysqli_fetch_array($querySkripsi)) {
			$nomorKalimat = ($noKalimat++) + 1;
			$arraySkripsi[] = array('nomor' => $nomorKalimat, 'id_judul_skripsi' => $rowSkripsi['id_judul_skripsi'], 'judul' => mysqli_escape_string($conn, $rowSkripsi['judul']));
			$kalimat[$no++] = mysqli_escape_string($conn, $rowSkripsi['judul']);
		}

		$prime_number = 2;
		$n_gram_value = 5;
		$n_window_value = 4;

		$arr_n_gram = array();
		$arr_rolling_hash = array();
		$arr_window = array();
		$arr_fingerprints = array();

		foreach ($kalimat as $key => $value) {
			$kalimat[$key] = strtolower(str_replace(' ', '', preg_replace("/[^a-zA-Z0-9\s-]/", "", $value)));

			$arr_n_gram[$key] = n_gram($kalimat[$key], $n_gram_value);

			$arr_rolling_hash[$key] = rolling_hash($arr_n_gram[$key]);

			$arr_window[$key] = windowing($arr_rolling_hash[$key], $n_window_value);

			$arr_fingerprints[$key] = fingerprints($arr_window[$key]);
		}

		$tambah = 1;


		$number_array = array();
		$count_union = array();

		for($a = 0; $a < count($arr_fingerprints); $a++) {
			$number_array[] = $a;
		}

		for($a = 0; $a < count($arr_fingerprints); $a++) {
			$urut = $a + 1;
			if($urut <= max($number_array)) {
				$count_union[] = count(array_merge_recursive($arr_fingerprints[0], $arr_fingerprints[$urut]));
			}
		}

		$count_intersect = array();

		for($a = 0; $a < count($arr_fingerprints); $a++) {
			$urut = $a + 1;
			if($urut <= max($number_array)) {
				$count_intersect[] = count(array_intersect($arr_fingerprints[0], $arr_fingerprints[$urut]));
			}
		}

		$union_intersect = array();

		foreach ($count_union as $key => $value) {
			$union_intersect[] = $value - $count_intersect[$key];
		}

		$koefisien_jaccard = array();

		foreach($union_intersect as $key => $value) {
			$koefisien_jaccard[] = round(($count_intersect[$key] / ($count_union[$key] - $count_intersect[$key]) * 100), 2);
		}

		foreach($arraySkripsi as $key => &$val){
			$val['count_union'] = $count_union[$key];
			$val['count_intersect'] = $count_intersect[$key];
			$val['union_intersect'] = $union_intersect[$key];
			$val['koefisien_jaccard'] = $koefisien_jaccard[$key];
		}

		mysqli_query($conn, "INSERT INTO tb_judul_mahasiswa(kode, fk_mahasiswa, judul, created, modified) VALUES('$kodeJudul', '$nim_fix', '$judul',  NOW(), NOW())");

		$sort = array();
		foreach($arraySkripsi as $k => $v) {
			$sort['koefisien_jaccard'][$k] = $v['koefisien_jaccard'];
		}

		array_multisort($sort['koefisien_jaccard'], SORT_DESC, $arraySkripsi);

		foreach(array_slice($arraySkripsi, 0, 1) as $key => $value) {
			$id_pengguna_login = $_SESSION['userid'];
			$queryMahasiswa = mysqli_query($conn, "SELECT p.*, m.* FROM tb_pengguna p INNER JOIN tb_mahasiswa m ON p.kode = m.kode WHERE p.id_pengguna = '$id_pengguna_login'");
			$rowMahasiswa = mysqli_fetch_array($queryMahasiswa);

			$queryGetLast = mysqli_query($conn, "SELECT * FROM tb_judul_mahasiswa ORDER BY id_judul_mahasiswa DESC LIMIT 1");
			$rowGetLast = mysqli_fetch_array($queryGetLast);

			$fk_mahasiswa = $nim_fix;
			$fk_judul_skripsi = $value['id_judul_skripsi'];
			$fk_judul_mahasiswa = $rowGetLast['id_judul_mahasiswa'];
			$hasil = $value['koefisien_jaccard'];

			mysqli_query($conn, "INSERT INTO tb_hasil_kemiripan(fk_mahasiswa, fk_judul_skripsi, fk_judul_mahasiswa, hasil, created, modified) VALUES('$fk_mahasiswa', '$fk_judul_skripsi', '$fk_judul_mahasiswa', '$hasil', NOW(), NOW())");

			if($value['koefisien_jaccard'] < 50) {
				$getSkripsi = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_judul_skripsi");
				$rowSkripsi = mysqli_fetch_array($getSkripsi);
				$kodeSkripsi = $rowSkripsi['maxKode'];
				$noUrutSkripsi = (int) substr($kodeSkripsi, 2, 4);
				$noUrutSkripsi++;
				$charSkripsi = "JS";
				$kodeSkripsi = $charSkripsi . sprintf("%04s", $noUrutSkripsi);

				$judul_mahasiswa = $judul;

				$cekMahasiswa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_judul_skripsi WHERE fk_mahasiswa = '$fk_mahasiswa'"));
				if($cekMahasiswa < 1) {
					mysqli_query($conn, "INSERT INTO tb_judul_skripsi(kode, judul, fk_mahasiswa, created, modified) VALUES('$kodeSkripsi', '$judul_mahasiswa', '$fk_mahasiswa', NOW(), NOW())");
				}
			}
		}

		$berhasil++;
	}
}

function n_gram($word, $n) {
	$ngrams = array();
	$length = strlen($word);
	for ($i = 0; $i < $length; $i++) {
		if ($i > ($n - 2)) {
			$ng = '';
			for ($j = $n - 1; $j >= 0; $j--) {
				$ng .= $word[$i - $j];
			}
			$ngrams[] = $ng;
		}
	}
	return $ngrams;
}
function rolling_hash($ngram) {
	$roll_hash = array();
	foreach ($ngram as $ng) {
		$roll_hash[] = char2hash($ng);
	}
	return $roll_hash;
}
function char2hash($string) {
	$prime_number = 2;
	if (strlen($string) == 1) {
		return ord($string);
	} else {
		$result = 0;
		$length = strlen($string);
		for ($i = 0; $i < $length; $i++) {
			$result += ord(substr($string, $i, 1)) * pow($prime_number, $length - $i);
		}
		return $result;
	}
}
function windowing($rolling_hash, $n) {
	$ngram = array();
	$length = count($rolling_hash);
	$x = 0;
	for ($i = 0; $i < $length; $i++) {
		if ($i > ($n - 2)) {
			$ngram[$x] = array();
			$y = 0;
			for ($j = $n - 1; $j >= 0; $j--) {
				$ngram[$x][$y] = $rolling_hash[$i - $j];
				$y++;
			}
			$x++;
		}
	}
	return $ngram;
}
function fingerprints($window_table) {
	$n_window_value = 4;
	$fingers = array();
	for ($i = 0; $i < count($window_table); $i++) {
		$min = $window_table[$i][0];
		for ($j = 1; $j < $n_window_value; $j++) {
			if ($min > $window_table[$i][$j])
				$min = $window_table[$i][$j];
		}
		$fingers[] = $min;
	}
	return $fingers;
}

unlink($_FILES['file']['name']);
echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
?>