<?php 
	include "../config/koneksi.php";

	$id_orders = $_GET['id'];
	$sql = "SELECT * FROM  orders JOIN users ON orders.user_id=users.id WHERE orders.id_order='$id_orders'";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
	$data = $query->fetch_assoc();
?>

<div class="row">
	<?php
	$sql_bukti = "SELECT * FROM pembayaran LEFT JOIN orders ON pembayaran.order_id=orders.id_order WHERE orders.id_order = $id_orders";
	$Qbukti = mysqli_query($koneksi, $sql_bukti) or die("select data menu error :".mysqli_error());
	$bukti = $Qbukti->fetch_assoc();
	?>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?= $data['nama_kustomer']; ?></strong><br>
		<p>
			<?= $data['telpon']; ?><br>
			<?= $data['email']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Penggiriman</h3>
		<p>Alamat: <?= $data['alamat']; ?></p>
	</div>
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tanggal: <?= $data['tgl_order']; ?><br>
			Total: Rp <?= number_format($data['total']); ?><br>
			Status: <?= $data['status_order']; ?> | 
			<?php if ($data["status_order"]=="Menunggu Konfirmasi" OR $data["status_order"]=="Proses"): ?>
                <a href="./index.php?page=konfirmasi&id=<?= $data['id_order']; ?>" class="btn btn-success btn-sm">Konfirmasi Pembayaran</a>
            <?php endif ?>
		</p>
	</div>
</div>

<table class="table simple-table">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql_detail = "SELECT * FROM order_detail JOIN produk ON order_detail.produk_id=produk.id_produk WHERE order_detail.orders_id='$id_orders'";
		$Qdetail = mysqli_query($koneksi, $sql_detail) or die("select data menu error :".mysqli_error());
		?>
		<?php while ($data = $Qdetail->fetch_assoc()) { ?>
		<tr>
			<td><?= $data['nama_produk']; ?></td>
			<td>Rp <?= number_format($data['harga_produk']); ?></td>
			<td><?= $data['jumlah']; ?></td>
			<td>Rp <?= number_format($data['harga_produk']* $data['jumlah']); ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>