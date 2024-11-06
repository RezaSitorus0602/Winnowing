<?php include 'koneksi.php'; ?>
<?php
$query = mysqli_query($conn, "SELECT * FROM tb_konfigurasi");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="id">
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
						<h1>Persentase Kemiripan</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item">Persentase Kemiripan</div>
						</div>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-12 col-md-12 col-lg-12">
								<div class="card">
									<form method="POST" action="#" id="data-form">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="persentase">Persentase Kemiripan (%)</label>
														<input type="number" name="persentase" id="persentase" class="form-control" required="" autocomplete="off" placeholder="Persentase Kemiripan" autofocus="" min="1" max="100" value="<?php echo $row['persentase'];?>">
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
											<input type="submit" name="submit" class="btn btn-primary" value="Simpan Perubahan">
										</div>
									</form>
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
					url: "proses/update-persentase-kemiripan.php",
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
								window.location = "persentase-kemiripan";
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