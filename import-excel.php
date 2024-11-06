<?php include 'koneksi.php'; ?>
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
						<h1>Import Excel</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item">Import Excel</div>
						</div>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-12 col-md-12 col-lg-12">
								<div class="card">
									<form method="POST" action="#" id="data-form" enctype="multipart/form-data">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="file">File Excel</label>
														<input type="file" name="file" id="file" class="form-control" required="">
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<button type="button" class="btn btn-success"><a href="format_excel.xls" download="" style="color: #fff;"><i class="fas fa-download"></i> Unduh Format Excel</a></button>
											<input type="submit" name="submit" class="btn btn-primary float-right" value="Import Data">
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
					url: "proses/get-excel.php",
					data: data,
					processData: false,
					contentType: false,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							swal({
								title: "Pemberitahuan",
								text: "Berhasil mengimport data",
								icon: "success"
							}).then(function() {
								window.location = "import-excel";
							});
						}else {
							swal('Peringatan', 'Maaf, gagal mengimport data', 'error');
						}
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>