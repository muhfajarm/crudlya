<?php
  require "layouts/header.php";
  $id_produk = $_GET['id'];

  if (isset($_GET['id'])) {
    $sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($result);
  }
?>
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="./">Home</a>
						<i>|</i>
					</li>
					<li><?=$data["nama_produk"];?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>D</span>etail
				<span>P</span>roduk</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="./asset/images/si1.jpg">
									<div class="thumb-image">
										<img <?="src='./asset/img/produk/$data[gambar]'" ;?> data-imagezoom="true" class="img-fluid" alt="" style=" width: 250px; height: 250px;">
									</div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?=$data["nama_produk"];?> <span class="badge badge-success"><?= $data['status'] ?></span></h3>
					<p class="mb-3">
						<span class="item_price">Rp <?=number_format($data["harga"],0,",",".");?></span>
					</p>
					<div class="single-infoagile">
					</div>
					<div class="product-single-w3l">
					    <label><?=$data["deskripsi"];?></label>
					</div><br>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form method="post">
								<label>Qty</label>
								<input type="number" min="1" max='<?=$data["stok"];?>' value="1" name="qty"required><br>
								<label>Stok <?=$data["stok"];?></label>
								<?php if ($data["stok"]<=0) { ?>
        							<div class="btn btn-danger">Habis!</div>
        						<?php }else{ ?>
    								<fieldset>
    									<input type="hidden" name="id_produk" value="<?=$data["id_produk"];?>">
    									<input type="submit" name="beli" value="Tambah ke keranjang" class="button btn" />
    								</fieldset>
								<?php } ?>
							</form>
						</div>
					</div>
					<?php
			        	if (isset($_POST['beli'])) {
			            	$qty = $_POST['qty'];

			            	$_SESSION['keranjang'][$id_produk] = $qty;
			            	echo "<script>alert('Produk telah dimasukkan ke keranjang belanja')</script>";
			            	echo "<script>location='cart.php?'</script>";
			     		}
			     	?>
				</div>
			</div>
		</div>
	</div>
	<!-- //Single Page -->

<?php require "layouts/footer.php"; ?>