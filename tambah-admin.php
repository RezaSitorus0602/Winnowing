<?php include 'koneksi.php'; ?>
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
						<h1>Tambah Admin</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item"><a href="admin">Admin</a></div>
							<div class="breadcrumb-item">Tambah Admin</div>
						</div>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<form role="form" action="#" method="POST" enctype="multipart/form-data" id="data-form">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="nama_lengkap">Nama Lengkap</label>
														<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required="" autocomplete="off" placeholder="Nama Lengkap" autofocus="" minlength="1" maxlength="100">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="level">Level</label>
														<select class="form-control select2" name="level" id="level" required="">
															<option value="">Pilih Level</option>
															<option value="Admin">Admin</option>
															<option value="Dosen">Dosen</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="email">Email</label>
														<input type="email" name="email" id="email" class="form-control" required="" autocomplete="off" placeholder="Email" minlength="5" maxlength="50">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="password">Kata Sandi</label>
														<input type="password" name="password" id="password" class="form-control" required="" autocomplete="off" placeholder="Kata Sandi" minlength="5" maxlength="20">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="username">Nama Pengguna</label>
														<input type="text" name="username" id="username" class="form-control" required="" autocomplete="off" placeholder="Nama Pengguna" minlength="5" maxlength="20">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<a href="admin" class="btn btn-danger">Kembali</a>
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
					url: "proses/add-admin.php",
					data: data,
					processData: false,
					contentType: false,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							swal({
								title: "Pemberitahuan",
								text: "Berhasil menambah data ",
								icon: "success"
							}).then(function() {
								window.location = "admin";
							});
						}else {
							swal('Peringatan', 'Maaf, gagal menambah data', 'error');
						}
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>