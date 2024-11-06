<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT m.*, p.* FROM tb_mahasiswa m INNER JOIN tb_prodi p ON m.fk_prodi = p.id_prodi WHERE m.id_mahasiswa = '$id'");
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
						<h1>Detail Mahasiswa</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item"><a href="mahasiswa">Mahasiswa</a></div>
							<div class="breadcrumb-item">Detail Mahasiswa</div>
						</div>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<form role="form" action="#" method="POST" enctype="multipart/form-data" id="data-form">
											<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
											<input type="hidden" name="kode" id="kode" value="<?php echo $row[1];?>">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="nim">NIM</label>
														<input type="text" name="nim" id="nim" class="form-control" required="" autocomplete="off" placeholder="NIM" autofocus="" maxlength="12" minlength="8" onkeypress="return" value="<?php echo $row['nim'];?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="fk_prodi">Prodi</label>
														<select class="form-control select2" name="fk_prodi" id="fk_prodi" required="">
															<option value="<?php echo $row['fk_prodi'];?>"><?php echo $row['nama_prodi'];?></option>
															<?php
															$prodiid = $row['fk_prodi'];
															$querySelect = mysqli_query($conn, "SELECT * FROM tb_prodi WHERE id_prodi != '$prodiid' ORDER BY nama_prodi ASC");
															while($rowSelect = mysqli_fetch_array($querySelect)) {
																?>
																<option value="<?php echo $rowSelect['id_prodi'];?>"><?php echo $rowSelect['nama_prodi'];?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="nama_mahasiswa">Nama Mahasiswa</label>
														<input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required="" autocomplete="off" placeholder="Nama mahasiswa" autofocus="" minlength="1" maxlength="100" value="<?php echo $row['nama_mahasiswa'];?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="HP">Nomor HP</label>
														<input type="number" name="HP" id="HP" class="form-control" required="" autocomplete="off" placeholder="HP" autofocus="" value="<?php echo $row['HP'];?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="email">Email</label>
														<input type="email" name="email" id="email" class="form-control" required="" autocomplete="off" placeholder="Email" autofocus="" minlength="1" maxlength="50" value="<?php echo $row['email'];?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="tempat_lahir">Tempat Lahir</label>
														<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required="" autocomplete="off" placeholder="Tempat Lahir" autofocus="" minlength="1" maxlength="50" value="<?php echo $row['tempat_lahir'];?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="jenis_kelamin">Jenis Kelamin</label>
														<select class="form-control select2" name="jenis_kelamin" id="jenis_kelmain">
															<option value="Laki - Laki" <?php if($row['jenis_kelamin'] == "Laki - Laki") {echo "selected=''";} ?>>Laki - Laki</option>
															<option value="Perempuan" <?php if($row['jenis_kelamin'] == "Perempuan") {echo "selected=''";} ?>>Perempuan</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="tanggal_lahir">Tanggal Lahir</label>
														<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required="" autocomplete="off" placeholder="Tanggal Lahir" autofocus="" value="<?php echo $row['tanggal_lahir'];?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="alamat">Alamat</label>
														<textarea class="form-control" name="alamat" id="alamat" required="" rows="4" placeholder="Tulis Alamat" style="height: 125px;"><?php echo $row['alamat'];?></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<a href="mahasiswa" class="btn btn-danger">Kembali</a>
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
				var nim = $('#nim').val();
				if(nim.length < 8) {
					swal('Peringatan', 'Maaf, NIM tidak lengkap', 'error');
				}else {
					$.ajax({
						type: "POST",
						url: "proses/update-mahasiswa.php",
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
									window.location = "mahasiswa";
								});
							}else {
								if(dataresponse.type == "nim") {
									swal('Peringatan', 'Maaf, NIM sudah digunakan', 'error');
								}else if(dataresponse.type == "HP") {
									swal('Peringatan', 'Maaf, nomor HP sudah digunakan', 'error');
								}else if(dataresponse.type == "email") {
									swal('Peringatan', 'Maaf, Email sudah digunakan', 'error');
								}else {
									swal('Peringatan', 'Maaf, gagal mengubah data', 'error');
								}
							}
						}
					});
					return false;
				}
			});
		});
	</script>
</body>
</html>