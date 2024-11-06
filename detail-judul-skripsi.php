<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT js.*, mh.* FROM tb_judul_skripsi js INNER JOIN tb_mahasiswa mh ON js.fk_mahasiswa = mh.id_mahasiswa WHERE js.id_judul_skripsi = '$id'");
$row = mysqli_fetch_array($query);
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
						<h1>Detail Judul Skripsi</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item"><a href="judul-skripsi">Judul Skripsi</a></div>
							<div class="breadcrumb-item">Detail Judul Skripsi</div>
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
												<div class="col-md-6">
													<div class="form-group">
														<label for="fk_mahasiswa">Mahasiswa</label>
														<select class="form-control select2" name="fk_mahasiswa" id="fk_mahasiswa" required="" style="width: 100%;">
															<option value="<?php echo $row['fk_mahasiswa'];?>"><?php echo $row['nama_mahasiswa'];?></option>
															<?php
															$mahasiswaid = $row['fk_mahasiswa'];
															$querySelect = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa != '$mahasiswaid' ORDER BY nama_mahasiswa ASC");
															while($rowSelect = mysqli_fetch_array($querySelect)) {
																?>
																<option value="<?php echo $rowSelect['id_mahasiswa'];?>"><?php echo $rowSelect['nama_mahasiswa'];?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="judul">Judul</label>
														<input type="text" name="judul" id="judul" class="form-control" required="" autocomplete="off" placeholder="Judul" autofocus="" minlength="5" value="<?php echo $row['judul'];?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<a href="judul-skripsi" class="btn btn-danger">Kembali</a>
													<button type="submit" class="btn btn-primary float-right">Simpan</button>
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
	<script type="text/javascript">
		$(document).ready(function() {
			$("#data-form").submit(function(e) {
				e.preventDefault();
				var data = new FormData(this);
				$.ajax({
					type: "POST",
					url: "proses/update-judul-skripsi.php",
					data: data,
					processData: false,
					contentType: false,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							swal({
								title: "Pemberitahuan",
								text: "Berhasil mengubah data",
								icon: "success"
							}).then(function() {
								window.location = "judul-skripsi";
							});
						}else {
							swal('Peringatan', 'Maaf, gagal mengubah data', 'error');
						}
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>