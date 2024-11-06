<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="author" content="Universitas Sebelas Maret">
	<meta name="description"
		content="Aplikasi Penerapan Algoritma Winnowing Untuk Mendeteksi Similaritas Teks Pada Judul Skripsi / TA">
	<meta name="keywords" content="winnowing, php, mysql, algoritma winnowing, Universitas Sebelas Maret">
	<title>Algoritma Winnowing</title>
	<link rel="shortcut icon" href="assets/images/favicon.png">
	<link rel="stylesheet" href="assets/plugins/myplugins/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/myplugins/fontawesome/css/all.css">
	<link rel="stylesheet" href="assets/plugins/bootstrap-social/bootstrap-social.css">
	<link rel="stylesheet" href="assets/dist/css/style.css">
	<link rel="stylesheet" href="assets/dist/css/components.css">
	<style type="text/css">
		body {
			background-image: url('https://pbs.twimg.com/media/FS4HT7LUEAAitT_.jpg:large');
			background-repeat: no-repeat;
			background-size: 100% 100%;
		}

		img.kanan {
			position: absolute;
			bottom: 8px;
			right: 16px;
			font-size: 18px;
			width: 150px;
		}
	</style>
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div
						class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="card card-primary">
							<div class="card-header">
								<div class="row" align="center">
									<div class="col-md-12">
										<h4>Aplikasi Penerapan Algoritma Winnowing Untuk Mendeteksi Kemiripan Teks Pada
											Judul Skripsi / TA</h4>
									</div>
								</div>
							</div>
							<div class="card-body">
								<form method="POST" action="#" id="login">
									<div class="form-group">
										<label for="username">NIM</label>
										<input type="text" class="form-control" name="username" id="username"
											required="" autofocus="" autocomplete="off" placeholder="NIM"
											minlength="5" maxlength="20">
									</div>
									<div class="form-group">
										<label for="password" class="control-label">Kata Sandi</label>
										<input type="password" class="form-control" name="password" id="password"
											required="" autocomplete="off" placeholder="Kata Sandi" minlength="5"
											maxlength="20">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block">
											Masuk
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="simple-footer">
							<p>
								<font color="#fff;">Hakcipta &copy; Universitas Sebelas Maret</font>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<img class="kanan" src="assets/images/logo uns.png" />
	<script src="assets/plugins/myplugins/jquery-3.3.1.min.js"></script>
	<script src="assets/plugins/myplugins/popper.min.js"></script>
	<script src="assets/plugins/myplugins/bootstrap.min.js"></script>
	<script src="assets/dist/js/jquery.nicescroll.min.js"></script>
	<script src="assets/dist/js/moment.min.js"></script>
	<script src="assets/plugins/sweetalert/docs/assets/sweetalert/sweetalert.min.js"></script>
	<script src="assets/dist/js/stisla.js"></script>
	<script src="assets/dist/js/scripts.js"></script>
	<script src="assets/dist/js/custom.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#login").submit(function (e) {
				e.preventDefault();
				var data = $(this).serialize();
				$.ajax({
					type: "POST",
					url: "proses/login.php",
					data: data,
					success: function (response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if (dataresponse.status == "0") {
							swal('Peringatan', 'Maaf, Kami tidak dapat menemukan akun Anda', 'error');
						} else if (dataresponse.status == "1") {
							swal({
								title: "Pemberitahuan",
								text: "Selamat datang " + dataresponse.nama,
								icon: "success"
							}).then(function () {
								window.location = "beranda";
							});
						} else {
							swal('Peringatan', 'Maaf, Kami tidak dapat menemukan akun Anda', 'error');
						}
					}
				});
				return false;
			});
		});
	</script>
</body>

</html>