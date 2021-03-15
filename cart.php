<?php

require "layouts/header.php";

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
  echo "<script>alert('Keranjang belanja kosong');</script>";
  echo "<script>location='./';</script>";
}
$count = count($_SESSION['keranjang']);

?>

<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Keranjang belanja anda berisi :
					<span><?=$count?> Produk</span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub mb-3">
						<thead>
							<tr>
								<th class="w-25">Produk</th>
								<th>Jumlah</th>
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
								<?php 
							        $sql = "SELECT * FROM  produk WHERE id_produk = '$id_produk'";
							        $ambil = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
							        $pecah = $ambil->fetch_assoc();
						        ?>
								<tr class="rem">
									<td class="invert-image">
										<a href="tampil.php?id=<?=$pecah["id_produk"];?>">
											<img <?="src='./asset/img/produk/$pecah[gambar] 'width='150' height='75'";?><?php "alt='$pecah[gambar]'" ;?> class="img-responsive">
										</a>
									</td>
									<td class="invert">
										<div class="quantity">
											<div class="quantity-select">
												<div>
													<div class="btn-increment-decrement" onClick="decrement_quantity(<?=$pecah["id_produk"];?>)">-</div>
													<input class="input-quantity" id="input-quantity-<?=$pecah["id_produk"];?>" value="<?=$jumlah?>" disabled>
													<div class="btn-increment-decrement" onClick="increment_quantity(<?=$pecah["id_produk"];?>)">+</div>
												</div>
											</div>
										</div>
									</td>
									<td class="invert"><?=$pecah["nama_produk"];?> <span class="badge badge-success"><?= $pecah['status'] ?></span></td>
									<td class="invert">Rp <?=number_format($pecah["harga"],0,",",".");?></td>
									<td class="invert">
										<a href="hapuskeranjang.php?id=<?=$id_produk ?>" class="btn btn-danger btn-sm">Hapus</a>
										<input type="hidden" id="id_produk" value="<?=$id_produk ?>">
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div>
					<div class="row">
						<div class="col-10">
							<a href="./" class="btn btn-default">Lanjut belanja</a>
						</div>
						<div class="col-2">
							<a href="./checkout.php" class="btn btn-primary float-right">Bayar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require "layouts/footer.php"; ?>