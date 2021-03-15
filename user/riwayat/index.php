<?php
  include "./config/koneksi.php";
  if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){
    echo "<script>alert('Harap masuk atau mendaftar terlebih dahulu');</script>";
    echo "<script>location='./../';</script>";
  }
?>

<div class="container">
	<h3>Riwayat Belanja <?= $_SESSION['users']['nama'] ?></h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">Tanggal</th>
				<th style="text-align: center;">Status</th>
				<th style="text-align: center;">Total</th>
				<th style="text-align: center;">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$id_users = $_SESSION['users']['id'];

			$sql_idusers = "SELECT * FROM orders WHERE user_id = $id_users";
			$Qid_users = mysqli_query($koneksi, $sql_idusers) or die("select data menu error :".mysqli_error());
			while ($data = $Qid_users->fetch_assoc()) {
			?>
			 <tr>
			 	<td style="text-align: right;"><?= $data['tgl_order'] ?></td>
			 	<td style="text-align: right;">
			 		<?= $data['status_order'] ?><br>
			 		<?php if ($data['status_order']=='Dikirim'): ?>
			 			Resi: <?= $data['resi'] ?>
			 		<?php endif ?>
			 	</td>
			 	<td style="text-align: right;">Rp <?= number_format($data['total'],0,",",".") ?></td>
			 	<td>
			 		<div class="float-right">
				 		<a href="./user.php?p=nota&id=<?=$data['id_order']?>" class="btn btn-info btn-sm">Nota</a>
				 		<?php if ($data['status_order']=='Pending'): ?>
				 			<a href="./user.php?p=pembayaran&id=<?=$data['id_order']?>" class="btn btn-success btn-sm">Input Pembayaran</a>
				 		<?php else: ?>
				 			<a href="./user.php?p=lihatpembayaran&id=<?=$data['id_order']?>" class="btn btn-sm btn-warning">Lihat Pembayaran</a>
				 		<?php endif ?>
				 		<?php if ($data['status_order']=='Dikirim'): ?>
				 			<a href="./user.php?p=diterima&id=<?=$data['id_order']?>" class="btn btn-success btn-sm" name="diterima">Diterima</a>
				 		<?php else: ?>

				 		<?php endif ?>
			 		</div>
			 	</td>
			 </tr>
			<?php } ?>
		</tbody>
	</table>
</div>