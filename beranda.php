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
						<h1>Beranda</h1>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="far fa-user"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Mahasiswa</h4>
									</div>
									<div class="card-body">
										<?php
										$kueri = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM tb_mahasiswa");
										$tampil = mysqli_fetch_array($kueri);
										echo $tampil['jumlah'];
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-danger">
									<i class="far fa-newspaper"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Prodi</h4>
									</div>
									<div class="card-body">
										<?php
										$kueri = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM tb_prodi");
										$tampil = mysqli_fetch_array($kueri);
										echo $tampil['jumlah'];
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-warning">
									<i class="far fa-file"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Judul Skripsi</h4>
									</div>
									<div class="card-body">
										<?php
										$kueri = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM tb_judul_skripsi");
										$tampil = mysqli_fetch_array($kueri);
										echo $tampil['jumlah'];
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card-statistic-1">
								<div class="card-wrap">
									<div class="card-header">
										<h4>Pengisian KRS</h4>
									</div>
									<hr>
									<div class="card-body">

									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card-statistic-1">
								<div class="card-wrap">
									<div class="card-header">
										<h4>Jika Status Login Pending</h4>
									</div>
									<hr>
									<div class="card-body">

									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card-statistic-1">
								<div class="card-wrap">
									<div class="card-header">
										<h4>Pertanyaan Umum</h4>
									</div>
									<hr>
									<div class="card-body">

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