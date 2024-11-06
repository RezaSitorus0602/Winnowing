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
						<h1>Tambah Judul Mahasiswa</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item"><a href="judul-mahasiswa">Judul Mahasiswa</a></div>
							<div class="breadcrumb-item">Tambah Judul Mahasiswa</div>
						</div>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<form role="form" action="#" method="POST" enctype="multipart/form-data" id="data-form">
											<?php if($_SESSION['level'] == "Mahasiswa") { ?>
												<input type="hidden" name="fk_mahasiswa" id="fk_mahasiswa" value="<?php echo $rowMHS['id_mahasiswa'];?>">
											<?php } ?>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="judul">Judul</label>
														<input type="text" name="judul" id="judul" class="form-control" required="" autocomplete="off" placeholder="Judul" autofocus="" minlength="5">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<a href="judul-mahasiswa" class="btn btn-danger">Kembali</a>
													<button type="submit" class="btn btn-primary float-right">Simpan</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-12" id="tampil_data" style="display: none;">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="fetched-data"></div>
											</div>
										</div>
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
				var judul = $('#judul').val();
				$.ajax({
					type: "POST",
					url: "proses/add-judul-mahasiswa.php",
					data: data,
					processData: false,
					contentType: false,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							swal('Peringatan', 'Berhasil menambah data', 'success');
							$('#tampil_data').css('display', 'block');
							$.ajax({
								type : 'POST',
								url : 'proses/check-judul-mahasiswa.php',
								data :  'judul='+judul,
								success : function(data){
									$('.fetched-data').html(data);
								}
							});
						}else if(dataresponse.status == "2") {
							swal('Peringatan', 'Maaf, Anda sudah mengajukan sebanyak 5x', 'error');
							$('#tampil_data').css('display', 'none');
						}else if(dataresponse.status == "3") {
							swal('Peringatan', 'Maaf, Judul sudah digunakan', 'error');
							$('#tampil_data').css('display', 'none');
						}else if(dataresponse.status == "4") {
							swal('Peringatan', 'Maaf, Anda sudah mengajukan skripsi', 'error');
							$('#tampil_data').css('display', 'none');
						}else {
							$('#tampil_data').css('display', 'none');
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