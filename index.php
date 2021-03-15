<?php
  require "layouts/header.php";
?>

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								<?php if(mysqli_num_rows($query)>0){ ?>
							    <?php
							        while($data = mysqli_fetch_array($query)){
							    ?>
								<div class="col-md-3 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img <?php "alt='$data[gambar]'" ;?> <?="src='./asset/img/produk/$data[gambar]' width='200' height='250'" ;?>>
											<!-- <img src="asset/images/m1.jpg" alt=""> -->
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="tampil.php?id=<?=$data["id_produk"];?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single.html"><?=substr($data["nama_produk"],0,18);?> <span class="badge badge-success"><?= $data['status'] ?></span></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">Rp <?=number_format($data["harga"],0,",",".");?></span>
												<!-- <del>$280.00</del> -->
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											    <?php if ($data["stok"]<=0) { ?>
                        							<div class="btn btn-danger">Habis!</div>
                        						<?php }else{ ?>
    												<div class="button btn" onClick="addtocart(<?=$data["id_produk"];?>)">
    													Tambah ke keranjang
    													<input type="hidden" id="input-qty-<?=$data["id_produk"];?>" value="0">
    												</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							    <?php
							    }else{
							        echo "Tidak ada data...";
							    } ?>
							</div>
						</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
			</div>
		</div>
	</div>
	<!-- //top products -->

<?php require "layouts/footer.php"; ?>