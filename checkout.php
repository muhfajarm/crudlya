<?php
	require "layouts/checkout/header.php";
	// if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){
	//   header("location:./auth/login.php?pesan=belum_login");
	// }
	$count = count($_SESSION['keranjang']);
?>
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Keranjang belanja anda berisi :
					<span><?=$count?> Produk</span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th class="w-25">Produk</th>
								<th>Jumlah</th>
								<th>Nama Produk</th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php $totalbelanja = 0; ?>
							<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
								<?php 
							        $sql = "SELECT * FROM  produk WHERE id_produk = '$id_produk'";
							        $ambil = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
							        $pecah = $ambil->fetch_assoc();
							        
							        $sum = 0;
                                    foreach ($_SESSION['keranjang'] as $item){
                                        $sum += $item['berat']*$item['jumlah'];
                                    }
						        ?>
						        <input type="hidden" id="berat" value="<?= $sum; ?>">
								<tr class="rem">
									<td class="invert-image">
										<a href="tampil.php?id=<?=$pecah["id_produk"];?>">
											<img <?="src='./asset/img/produk/$pecah[gambar] 'width='150' height='75'";?><?php "alt='$pecah[gambar]'" ;?> class="img-responsive">
										</a>
									</td>
									<td class="invert">
										<div class="quantity">
											<div class="quantity-select">
												<div class="entry value">
													<span><?=$jumlah?></span>
												</div>
											</div>
										</div>
									</td>
									<td class="invert"><?=$pecah["nama_produk"];?> <span class="badge badge-success"><?= $pecah['status'] ?></span></td>
									<td class="invert">Rp <?=number_format($pecah["harga"],0,",",".");?></td>
								</tr>
							<?php $totalbelanja+=($pecah["harga"]*$jumlah); ?>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
						        <th colspan="3" class="text-right">Subtotal</th>
						        <th>Rp <?= number_format($totalbelanja,0,",",".") ?></th>
						      </tr>
						      <tr id="tr_ongkir">
						        <th colspan="3" class="text-right">Ongkos Kirim</th>
						        <th id="th_ongkir">Rp 0</th>
						      </tr>
						      <tr id="tr_total">
						        <th colspan="3" class="text-right">Total Belanja</th>
						        <th id="th_total">Rp <?= number_format($totalbelanja,0,",",".")  ?></th>
						      </tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Isi Data Diri</h4>
					<form action="./bayar.php" method="post" class="creditly-card-form agileinfo_form" id="formbayar">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="nama" placeholder="Nama Lengkap" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="E-mail" name="email" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="No Handphone" name="telpon" required="">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="controls form-group">
												<select class="option-w3ls" id="provinsi" name="provinsi" disabled>
													<option>Pilih Provinsi</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="controls form-group" id="divkota">
												<select class="option-w3ls" id="kota" name="kota" disabled>
													<option>Pilih Kota/Kabupaten</option>
												</select>
										    	<input type="hidden" id="id_kota" name="id_kota">
											</div>
										</div>
										<div class="col-md-3">
											<div class="controls form-group">
												<select class="option-w3ls" id="kurir" name="kurir" disabled>
													<option>Pilih Kurir</option>
										            <?php
										              $sqlkurir = "SELECT * FROM jasa_pengiriman";
										              $hasil = mysqli_query($koneksi, $sqlkurir);
										              while($kurir = mysqli_fetch_array($hasil)){
										            ?>
										              <option value="<?=$kurir['kode'];?>"><?=$kurir['nama'];?></option>
										            <?php } ?>
												</select>
												<input type="hidden" id="kodekurir" name="kodekurir">
											</div>
										</div>
										<div class="col-md-3">
											<div id="hargalayanan" class="controls form-group">
												<select class="option-w3ls" id="layanan" name="layanan" disabled>
													<option>Pilih Layanan</option>
												</select>
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Alamat lengkap" name="alamat" required="">
									</div>
								</div>
								<div class="checkout-right-basket">
									<button class="submit check_out btn" name="bayar">Checkout<span class="far fa-hand-point-right"></span></button>
									<input type="hidden" name="subtotal" value="<?= $totalbelanja  ?>">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->

<?php require "layouts/checkout/footer.php"; ?>