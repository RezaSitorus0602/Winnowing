<?php include 'koneksi.php'; ?>
<?php
$query = mysqli_query($conn, "SELECT * FROM tb_pengaturan WHERE status = 'kontak'");
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
			<div class="navbar-bg" ></div>
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
						<h1>Kontak</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item">Kontak</div>
						</div>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<form role="form" action="#" method="POST" enctype="multipart/form-data"
											id="data-form">
											<input type="hidden" name="id" id="id" value="<?php echo $row['id_pengaturan'];?>">
											<div class="row">
                                                <div class="col-md-12">
													<div class="form-group">
														<label for="keterangan">Keterangan</label>
														<textarea class="summernote" name="keterangan" id="keterangan" required=""><?php echo $row['keterangan'];?></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12" align="center">
													<button type="submit" class="btn btn-primary"
														style="width: 80%;">Ubah</button>
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
				url: "proses/update-pengaturan.php",
				data: data,
				processData: false,
				contentType: false,
				success: function(response) {
					var dataresponse = JSON.parse(response);
					console.log(dataresponse);
					if (dataresponse.status == "1") {
						swal({
							title: "Pemberitahuan",
							text: "Berhasil mengubah data",
							icon: "success"
						}).then(function() {
							window.location = "kontak";
						});
					} else {
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