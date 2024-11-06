<?php
include '../koneksi.php';

$queryPersentase = mysqli_query($conn, "SELECT * FROM tb_konfigurasi");
$rowPersentase = mysqli_fetch_array($queryPersentase);

$arraySkripsi = array();
$kalimat = array();

$kalimat[0] = $_POST['judul'];

$no = 1;
$noKalimat = 1;
$querySkripsi = mysqli_query($conn, "SELECT * FROM tb_judul_skripsi");
while($rowSkripsi = mysqli_fetch_array($querySkripsi)) {
	$nomorKalimat = ($noKalimat++) + 1;
	$arraySkripsi[] = array('nomor' => $nomorKalimat, 'id_judul_skripsi' => $rowSkripsi['id_judul_skripsi'], 'judul' => mysqli_escape_string($conn, $rowSkripsi['judul']));
	$kalimat[$no++] = mysqli_escape_string($conn, $rowSkripsi['judul']);
}

$prime_number = 2;
$n_gram_value = 9;
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
?>
<h4 align="center"><?php echo $_POST['judul'];?></h4>
<div class="table-responsive">
	<table class="table table-striped table-bordered" align="center">
		<thead>
			<tr align="center">
				<?php
				for($a = 0; $a < count($arr_fingerprints); $a++) {
					echo "<th align='center'>Jumlah Fingerprints Kalimat ".($a+1)."</th>";
				}
				?>
			</tr>
		</thead>
		<tbody>
			<tr align="center">
				<?php
				for($a = 0; $a < count($arr_fingerprints); $a++) {
					$keys = array_keys(array_slice($arr_fingerprints, 0, $tambah++));
					echo "<td align='center'>".count($arr_fingerprints[$keys[$a]])."</td>";
				}
				?>
			</tr>
		</tbody>
	</table>
</div>
<div class="table-responsive">
	<table class="table table-striped" align="center" id="table-1">
		<thead>
			<tr align="center">
				<th>Kalimat</th>
				<th>Judul</th>
				<th>Union (Gabungan) Fingerprints</th>
				<th>Intersection (Fingerprints Yang Sama)</th>
				<th>(Union - Intersection)</th>
				<th>Persentase Plagiarisme</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$sort = array();
			foreach($arraySkripsi as $k => $v) {
				$sort['koefisien_jaccard'][$k] = $v['koefisien_jaccard'];
			}

			array_multisort($sort['koefisien_jaccard'], SORT_DESC, $arraySkripsi);

			if($_SESSION['level'] == "Mahasiswa") {

				foreach(array_slice($arraySkripsi, 0, 1) as $key => $value) {
					$id_pengguna_login = $_SESSION['userid'];
					$queryMahasiswa = mysqli_query($conn, "SELECT p.*, m.* FROM tb_pengguna p INNER JOIN tb_mahasiswa m ON p.kode = m.kode WHERE p.id_pengguna = '$id_pengguna_login'");
					$rowMahasiswa = mysqli_fetch_array($queryMahasiswa);

					$queryGetLast = mysqli_query($conn, "SELECT * FROM tb_judul_mahasiswa ORDER BY id_judul_mahasiswa DESC LIMIT 1");
					$rowGetLast = mysqli_fetch_array($queryGetLast);

					$fk_mahasiswa = $rowMahasiswa['id_mahasiswa'];
					$fk_judul_skripsi = $value['id_judul_skripsi'];
					$fk_judul_mahasiswa = $rowGetLast['id_judul_mahasiswa'];
					$hasil = $value['koefisien_jaccard'];

					mysqli_query($conn, "INSERT INTO tb_hasil_kemiripan(fk_mahasiswa, fk_judul_skripsi, fk_judul_mahasiswa, hasil, created, modified) VALUES('$fk_mahasiswa', '$fk_judul_skripsi', '$fk_judul_mahasiswa', '$hasil', NOW(), NOW())");

					if($value['koefisien_jaccard'] < $rowPersentase['persentase']) {
						$hasil = mysqli_query($conn, "SELECT max(kode) as maxKode FROM tb_judul_skripsi");
						$data = mysqli_fetch_array($hasil);
						$kode = $data['maxKode'];
						$noUrut = (int) substr($kode, 2, 4);
						$noUrut++;
						$char = "JS";
						$kode = $char . sprintf("%04s", $noUrut);

						$judul_mahasiswa = $_POST['judul'];

						$cekMahasiswa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_judul_skripsi WHERE fk_mahasiswa = '$fk_mahasiswa'"));
						if($cekMahasiswa < 1) {
							mysqli_query($conn, "INSERT INTO tb_judul_skripsi(kode, judul, fk_mahasiswa, created, modified) VALUES('$kode', '$judul_mahasiswa', '$fk_mahasiswa', NOW(), NOW())");
						}
					}
				}
			}

			foreach($arraySkripsi as $key => $value) {
				echo "<tr align='center'>";
				echo "<td>Kalimat ".$value['nomor']."</td>";
				echo "<td>".$value['judul']."</td>";
				echo "<td>".$value['count_union']."</td>";
				echo "<td>".$value['count_intersect']."</td>";
				echo "<td>".$value['union_intersect']."</td>";
				echo "<td>".$value['koefisien_jaccard']." %</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	"use strict";
	$("#table-1").dataTable({
		"aaSorting": []
	});
</script>
<script type="text/javascript">
	<?php
	if($_SESSION['level'] == "Mahasiswa") {
		foreach(array_slice($arraySkripsi, 0, 1) as $key => $value) {
			if($value['koefisien_jaccard'] < $rowPersentase['persentase']) {
				?>
				swal('Peringatan', 'Selamat, Judul Skripsi Anda telah disetujui', 'success');
			<?php } else { ?>
				swal('Peringatan', 'Maaf, Judul Skripsi Anda telah ditolak karena mempunyai banyak kesamaan dengan Judul Skripsi lainnya', 'error');
			<?php }
		} 
	}
	?>
</script>