<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
  <style>
  	body {
	    margin: 0;
	    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
	    font-size: 1rem;
	    font-weight: 400;
	    line-height: 1.5;
	    color: #212529;
	    text-align: left;
	    background-color: #fff;
	}

	.container {
		width: 100%;
	    padding-right: 15px;
	    padding-left: 15px;
	    margin-right: auto;
	    margin-left: auto;
	}

	@media (min-width: 1200px){
		.container, .container-lg, .container-md, .container-sm, .container-xl {
		    max-width: 1140px;
		}
	}
	@media (min-width: 992px){
		.container, .container-lg, .container-md, .container-sm {
		    max-width: 960px;
		}
	}
	@media (min-width: 768px){
		.container, .container-md, .container-sm {
		    max-width: 720px;
		}
	}
	@media (min-width: 576px){
		.container, .container-sm {
		    max-width: 540px;
		}
	}
	@media (min-width: 1200px){
		.container {
		    max-width: 1140px;
		}
	}
	@media (min-width: 992px){
		.container {
		    max-width: 960px;
		}
	}
	@media (min-width: 768px){
		.container {
		    max-width: 720px;
		}
	}
	@media (min-width: 576px){
		.container {
		    max-width: 540px;
		}
	}
	.container {
	  min-width: 992px !important;
	}

	table {
	    border-collapse: collapse;
	}
	.table {
	    width: 100%;
	    margin-bottom: 1rem;
	    color: #212529;
	}
	.table-bordered {
	    border: 1px solid #dee2e6;
	}
	.table-bordered thead td, .table-bordered thead th {
	    border-bottom-width: 2px;
	}
	.table thead th {
	    vertical-align: bottom;
	    border-bottom: 2px solid #dee2e6;
	}
	.table-bordered td, .table-bordered th {
	    border: 1px solid #dee2e6;
	}
	.table td, .table th {
	    padding: .75rem;
	    vertical-align: top;
	    border-top: 1px solid #dee2e6;
	}
	th {
	    text-align: inherit;
	}
	.table-bordered td, .table-bordered th {
	    border: 1px solid #dee2e6;
	}
	.table td, .table th {
	    padding: .75rem;
	    vertical-align: top;
	    border-top: 1px solid #dee2e6;
	}

	.text-center {
	    text-align: center!important;
	}
  </style>
</head>
<body>
	<?php
		// Load file koneksi.php
		include "../../../config/koneksi.php";
		$semuadata=array();
		if (isset($_POST['print'])) {
			$tgl_mulai = $_POST['tglm'];
			$tgl_selesai = $_POST['tgls'];

			$sql = "SELECT * FROM orders o LEFT JOIN users u ON o.user_id=u.id WHERE tgl_order BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
			$q = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
			while ($data = $q->fetch_assoc()) {
				$semuadata[]=$data;
			}

			// echo "<pre>";
			// print_r($semuadata);
			// echo "</pre>";
		}
	?>
	<div class="container">
		<h3 class="text-center">Laporan Pembelian dari <?= date('d F Y', strtotime($tgl_mulai)) ?> hingga <?= date('d F Y', strtotime($tgl_selesai)) ?></h3>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Pelanggan</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php $total=0; ?>
				<?php foreach ($semuadata as $key => $value): ?>
				<?php $total+=$value['total'] ?>
				<tr>
					<td><?= $key+1 ?></td>
					<td><?= $value['nama_kustomer'] ?></td>
					<td><?= date('d F Y', strtotime($value['tgl_order'])) ?></td>
					<td><?= $value['status_order'] ?></td>
					<td>Rp <?= number_format($value['total']) ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total</th>
					<th>Rp <?= number_format($total) ?></th>
				</tr>
			</tfoot>
		</table>
	</div>
</body>
</html>