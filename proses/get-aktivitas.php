<?php
include '../koneksi.php';

$id = $_POST['rowid'];
$sql =  mysqli_query($conn, "SELECT * FROM tb_aktivitas WHERE id_aktivitas = '$id'");
$result = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<tbody>
					<tr>
						<th>Alamat IP</th>
						<th><?php echo $result['ip'];?></th>
					</tr>
					<tr>
						<th>Browser</th>
						<th><?php echo $result['browser'];?></th>
					</tr>
					<tr>
						<th>Peramban Web</th>
						<th><?php echo $result['peramban_web'];?></th>
					</tr>
					<tr>
						<th>Sistem Operasi</th>
						<th><?php echo $result['sistem_operasi'];?></th>
					</tr>
					<tr>
						<th>Keterangan</th>
						<th><?php echo $result['keterangan'];?></th>
					</tr>
					<tr>
						<th>Tanggal</th>
						<th><?php echo tglIndonesia(date('d F Y H:i:s', strtotime($result['created'])));?></th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>