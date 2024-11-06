<div class="sidebar-brand">
	<a href="beranda">Algoritma Winnowing</a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
	<a href="beranda">AW</a>
</div>
<ul class="sidebar-menu">
	<li class="menu-header">Menu Pertama</li>
	<li><a class="nav-link" href="beranda"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
	<?php if ($online['level'] == "Admin") { ?>
		<li class="menu-header">Menu Kedua</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
				<span>Master</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="admin">Admin</a></li>
				<li><a class="nav-link" href="mahasiswa">Mahasiswa</a></li>
				<li><a class="nav-link" href="prodi">Prodi</a></li>
			</ul>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
				<span>Transaksi</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="hasil-kemiripan">Hasil Kemiripan</a></li>
				<li><a class="nav-link" href="judul-mahasiswa">Judul Mahasiswa</a></li>
				<li><a class="nav-link" href="judul-skripsi">Judul Skripsi</a></li>
			</ul>
		</li>
		<li class="menu-header">Menu Ketiga</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i>
				<span>Laporan</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="cetak-admin">Admin</a></li>
				<li><a class="nav-link" href="laporan-hasil-kemiripan">Hasil Kemiripan</a></li>
				<li><a class="nav-link" href="laporan-judul-mahasiswa">Judul Mahasiswa</a></li>
				<li><a class="nav-link" href="laporan-judul-skripsi">Judul Skripsi</a></li>
				<li><a class="nav-link" href="cetak-mahasiswa">Mahasiswa</a></li>
				<li><a class="nav-link" href="cetak-prodi">Prodi</a></li>
			</ul>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list-ul"></i>
				<span>Fasilitas</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="aktivitas">Aktivitas</a></li>
				<li><a class="nav-link" href="akun">Akun</a></li>
				<li><a class="nav-link" href="import-excel">Import Excel</a></li>
				<li><a class="nav-link" href="kontak">Kontak</a></li>
			</ul>
		</li>
	<?php } else if ($online['level'] == "Dosen") { ?>
			<li class="menu-header">Menu Kedua</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
					<span>Transaksi</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="hasil-kemiripan">Hasil Kemiripan</a></li>
					<li><a class="nav-link" href="judul-mahasiswa">Judul Mahasiswa</a></li>
					<li><a class="nav-link" href="judul-skripsi">Judul Skripsi</a></li>
				</ul>
			</li>
	<?php } else { ?>
			<li class="menu-header">Menu Kedua</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
					<span>Transaksi</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="judul-mahasiswa">Judul Mahasiswa</a></li>
				</ul>
			</li>
			<li class="menu-header">Menu Ketiga</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list-ul"></i>
					<span>Laporan</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="akun">Akun</a></li>
				</ul>
			</li>
	<?php } ?>
</ul>