	<!-- footer -->
	<footer>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
					</div>
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Kategori</h3>
						<ul>
							<?php
						        $sql = "SELECT * FROM  kategori ORDER BY nama_kategori ASC";
						        $QKategori = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
						        while($kategori = mysqli_fetch_array($QKategori)){
						    ?>
							<li class="mb-3">
								<a href="./?filter=<?=$kategori['id_kategori'];?>"><?=$kategori['nama_kategori'];?></a>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Kontak</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> Jl. Garuda gang II, Rt.07 Rw.02, Banaran, Boyolali.</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> 0895376666404 </li>
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:example@mail.com"> md.audio@gmail.com</a>
							</li>
						</ul>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- social icons
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
		<!-- //footer third section -->
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">© 2020 MD Audio. All rights reserved 
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="asset/js/jquery-2.2.3.min.js"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- cart-js -->
	<script src="asset/js/minicart.js"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- quantity -->
	<script>
		$('.value-plus').on('click', function () {
			let id_produk	= $('#id_produk').val()
			let divUpd		= $(this).parent().find('.value'),
				newVal		= parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			let id_produk	= $('#id_produk').val()
			let divUpd		= $(this).parent().find('.value'),
				newVal		= parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal)
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!-- //quantity -->
	
	<!-- scroll seller -->
	<script src="asset/js/scroll.js"></script>
	<!-- //scroll seller -->

	<!-- smoothscroll -->
	<script src="asset/js/SmoothScroll.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="asset/js/move-top.js"></script>
	<script src="asset/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="./asset/js/bootstrap.js"></script>
	<!-- //for bootstrap working -->

	<!-- Ongkir -->
	<script>
	$(document).ready(function() {
		$('#provinsi').append('<option value="">Loading...</option>')
		$.ajax({
			type: "GET",
			dataType: "html",
			url: "data-provinsi.php",
			success: function(msg){
				$("select#provinsi").html(msg)
	    		$('#provinsi').removeAttr('disabled')
			}
		})
		$('#provinsi').on('change', function() {
			let provinsi_id = $(this).val()
    		document.getElementById('kota').setAttribute('disabled', 'true')
    		$('#layanan').empty()
    		$('#layanan').append('<option>Pilih Layanan</option>')
    		document.getElementById('layanan').setAttribute('disabled', 'true')

			$.ajax({
    			type: "POST",
    			dataType: "html",
    			data:"prov_id="+provinsi_id,
    			url: "data-kota.php",
    			success: function(data){
    				$("select#kota").html(data);
		    		$('#kota').removeAttr('disabled')

					let idkotaku = $("#kota option:selected").val()
		        	$("#id_kota").val(idkotaku);
    			}
			})
		})
		$('#kota').on('change', function() {
    		$('#kurir').removeAttr('disabled')
    		let id_kota = $("#kota option:selected").val()
    		let nama_kota = $("#kota option:selected").attr("namakota")
    		$('#id_kota').val(id_kota)
    		$('#namakota').remove()
			$("#divkota").append('<input type="hidden" id="namakota" name="namakota" value="'+nama_kota+'">')
    		$('#layanan').empty()
    		$('#layanan').append('<option>Pilih Layanan</option>')
    		document.getElementById('layanan').setAttribute('disabled', 'true')
		})
		$('#kurir').on('change', function() {
			let kurirkode = $("#kurir option:selected").val()
			$("#kodekurir").val(kurirkode)
			let kotatujuan = $("input[name=id_kota]").val()
			$('#layanan').append('<option value="">Loading...</option>')
			$('#input_hargalayanan').remove()
			$('#cost').remove()
    				console.log(kurirkode);
    				console.log(kotatujuan);

			$.ajax({
    			type: "POST",
    			dataType: "html",
    			data:"courier="+kurirkode+"&destination="+kotatujuan,
    			url: "data-layanan.php",
    			success: function(data){
		    		$('#layanan').empty()
    				$("select#layanan").html(data);
		    		$('#layanan').removeAttr('disabled')

    				let pilihKurir = $("#layanan option:selected, this").attr("hargaKurir")
					$('#hargalayanan').append('<input type="hidden" name="input_hargalayanan" id="input_hargalayanan" class="form-control" value="'+pilihKurir+'">')
					let hargalayanan = $('#input_hargalayanan').val()
					let intOngkir = parseInt(hargalayanan)
					let format_ongkir = intOngkir.toLocaleString(
						undefined,
						{ minimumFractionDigits: 0 }
					)
					$('#formbayar').append('<input type="hidden" id="cost" name="cost" class="form-control" value="'+intOngkir+'">')
					$('#th_ongkir').empty()
					$('#th_ongkir').append('Rp '+format_ongkir)

					let subtotal = <?= $totalbelanja ?>;
					let total = parseInt(subtotal) + parseInt(hargalayanan)
					let format_total = total.toLocaleString(
						undefined,
						{ minimumFractionDigits: 0 }
					)
					$('#formbayar').append('<input type="hidden" id="amount" name="amount" class="form-control" value="'+total+'">')
					$('#th_total').empty()
					$('#th_total').append('Rp '+format_total)
    			}
			})
		})
		$('#layanan').on('change', function() {
			let pilihKurir = $("#layanan option:selected, this").attr("hargaKurir")
			$('#input_hargalayanan').val(pilihKurir)
			let hargalayanan = $('#input_hargalayanan').val()
			let intOngkir = parseInt(hargalayanan)
			let format_ongkir = intOngkir.toLocaleString(
				undefined,
				{ minimumFractionDigits: 0 }
			)
			$('#cost').val(intOngkir)
			$('#th_ongkir').empty()
			$('#th_ongkir').append('Rp '+format_ongkir)
			
			let subtotal = <?= $totalbelanja ?>;
			let total = parseInt(subtotal) + parseInt(hargalayanan)
			let format_total = total.toLocaleString(
				undefined,
				{ minimumFractionDigits: 0 }
			)
			$('#amount').val(total)
			$('#th_total').empty()
			$('#th_total').append('Rp '+format_total)
		})
	})
</script>
	<!-- // Ongkir -->
	<!-- //js-files -->
</body>

</html>