<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tb_judul_mahasiswa WHERE id_judul_mahasiswa = '$id'");
$row = mysqli_fetch_array($query);

$queryHasil = mysqli_query($conn, "SELECT hk.*, jm.*, js.* FROM tb_hasil_kemiripan hk INNER JOIN tb_judul_mahasiswa jm ON hk.fk_judul_mahasiswa = jm.id_judul_mahasiswa INNER JOIN tb_judul_skripsi js ON hk.fk_judul_skripsi = js.id_judul_skripsi WHERE hk.fk_judul_mahasiswa = '$id'");
$rowHasil = mysqli_fetch_array($queryHasil);

$prime_number = 2;
$n_gram_value = 5;
$n_window_value = 4;

$kalimat1 = strtolower(str_replace(' ', '', preg_replace("/[^a-zA-Z0-9\s-]/", "", $rowHasil[10])));
$kalimat2 = strtolower(str_replace(' ', '', preg_replace("/[^a-zA-Z0-9\s-]/", "", $rowHasil[16])));

$arr_n_gram1 = n_gram($kalimat1, $n_gram_value);
$arr_n_gram2 = n_gram($kalimat2, $n_gram_value);

$arr_rolling_hash1 = rolling_hash($arr_n_gram1);
$arr_rolling_hash2 = rolling_hash($arr_n_gram2);

$arr_window1 = windowing($arr_rolling_hash1, $n_window_value);
$arr_window2 = windowing($arr_rolling_hash2, $n_window_value);

$arr_fingerprints1 = fingerprints($arr_window1);
$arr_fingerprints2 = fingerprints($arr_window2);

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

$count_intersect = count(array_intersect($arr_fingerprints1, $arr_fingerprints2));
$count_union = count(array_merge($arr_fingerprints1, $arr_fingerprints2));

$union_intersect = $count_union - $count_intersect;

$koefisien_jaccard = round(($count_intersect / ($count_union - $count_intersect) * 100), 2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'menu/head.php'; ?>
</head>
<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<?php include 'menu/navbar.php'; ?>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<?php include 'menu/aside.php'; ?>
				</aside>
			</div>
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Detail Judul Mahasiswa</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item"><a href="judul-mahasiswa">Judul Mahasiswa</a></div>
							<div class="breadcrumb-item">Detail Judul Mahasiswa</div>
						</div>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<form role="form" action="#" method="POST" enctype="multipart/form-data" id="data-form">
											<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="judul">Judul</label>
														<input type="text" name="judul" id="judul" class="form-control" required="" autocomplete="off" placeholder="Judul" autofocus="" minlength="5" readonly="" style="background: #fff;" value="<?php echo $row['judul'];?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="kalimat_1">Kalimat 1</label>
														<textarea class="form-control" name="kalimat_1" id="kalimat_1" required="" readonly="" style="background: #fff; height: 125px;" rows="4"><?php echo $rowHasil[10];?></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="kalimat_2">Kalimat 2</label>
														<textarea class="form-control" name="kalimat_2" id="kalimat_2" required="" readonly="" style="background: #fff; height: 125px;" rows="4"><?php echo $rowHasil[16];?></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>N-GRAM Kalimat 1</th>
																	<th>N-GRAM Kalimat 2</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<textarea class="form-control" style="height: 125px;">
																			<?php
																			foreach ($arr_n_gram1 as $key => $value) {
																				echo $value." ";
																			}
																			?>
																		</textarea>
																	</td>
																	<td>
																		<textarea class="form-control" style="height: 125px;">
																			<?php
																			foreach ($arr_n_gram2 as $key => $value) {
																				echo $value." ";
																			}
																			?>
																		</textarea>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-md-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>Rolling Hash Kalimat 1</th>
																	<th>Rolling Hash Kalimat 2</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<textarea class="form-control" style="height: 125px;">
																			<?php
																			foreach ($arr_rolling_hash1 as $key => $value) {
																				echo $value." ";
																			}
																			?>
																		</textarea>
																	</td>
																	<td>
																		<textarea class="form-control" style="height: 125px;">
																			<?php
																			foreach ($arr_rolling_hash2 as $key => $value) {
																				echo $value." ";
																			}
																			?>
																		</textarea>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-md-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>Window Kalimat 1</th>
																	<th>Window Kalimat 2</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<textarea class="form-control" style="height: 125px;">
																			<?php
																			for($b = 0; $b < count($arr_window1); $b++) {
																				echo "W-" . ($b + 1) . " : {";
																				foreach ($arr_window1[$b] as $key => $value) {
																					echo $value." ";
																				}
																				echo "}\n";
																			}
																			?>
																		</textarea>
																	</td>
																	<td>
																		<textarea class="form-control" style="height: 125px;">
																			<?php
																			for($b = 0; $b < count($arr_window2); $b++) {
																				echo "W-" . ($b + 1) . " : {";
																				foreach ($arr_window2[$b] as $key => $value) {
																					echo $value." ";
																				}
																				echo "}\n";
																			}
																			?>
																		</textarea>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-md-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>Fingerprints Kalimat 1</th>
																	<th>Fingerprints Kalimat 2</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<textarea class="form-control" style="height: 125px;">
																			<?php
																			foreach ($arr_fingerprints1 as $key => $value) {
																				echo $value." ";
																			}
																			?>
																		</textarea>
																	</td>
																	<td>
																		<textarea class="form-control" style="height: 125px;">
																			<?php
																			foreach ($arr_fingerprints2 as $key => $value) {
																				echo $value." ";
																			}
																			?>
																		</textarea>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
													<hr>
												</div>
												<div class="col-md-12">
													<div class="table-responsive">
														<table class="table table-striped">
															<tbody>
																<tr>
																	<th style="width: 60%;">Jumlah Fingerprints Kalimat 1</th>
																	<th style="width: 10%;">:</th>
																	<th><?php echo count($arr_fingerprints1);?></th>
																</tr>
																<tr>
																	<th>Jumlah Fingerprints Kalimat 2</th>
																	<th>:</th>
																	<th><?php echo count($arr_fingerprints2);?></th>
																</tr>
																<tr>
																	<th>Union (Gabungan) Fingerprints 1 dan 2</th>
																	<th>:</th>
																	<th><?php echo $count_union;?></th>
																</tr>
																<tr>
																	<th>Intersection (Fingerprints Yang Sama)</th>
																	<th>:</th>
																	<th><?php echo $count_intersect;?></th>
																</tr>
																<tr>
																	<th>(Union - Intersection)</th>
																	<th>:</th>
																	<th><?php echo $count_union;?> - <?php echo $count_intersect;?> = <?php echo $union_intersect;?></th>
																</tr>
																<tr>
																	<th>Koefisien Jaccard = (Intersection / (Union-Intersection)) * 100</th>
																	<th>:</th>
																	<th>(<?php echo $count_intersect;?> / (<?php echo $count_union;?> - <?php echo $count_intersect;?>)) * 100 = <?php echo $koefisien_jaccard;?> %</th>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<a href="judul-mahasiswa" class="btn btn-danger">Kembali</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<footer class="main-footer">
				<?php include 'menu/footer.php'; ?>
			</footer>
		</div>
	</div>
	<?php include 'menu/script.php'; ?>
</body>
</html>