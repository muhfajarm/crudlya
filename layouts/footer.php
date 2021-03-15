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
						<ul>
							
						</ul>
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
								<a href="?filter=<?=$kategori['id_kategori'];?>"><?=$kategori['nama_kategori'];?></a>
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
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
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
	<!-- <script src="asset/js/minicart.js"></script> -->
	<!-- <script>
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
	</script> -->
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password").onchange = validatePassword;
			document.getElementById("konfirmasi_password").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("konfirmasi_password").value;
			var pass1 = document.getElementById("password").value;
			if (pass1 != pass2)
				document.getElementById("konfirmasi_password").setCustomValidity("Passwords Tidak Sama!");
			else
				document.getElementById("konfirmasi_password").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- imagezoom -->
	<script src="asset/js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- flexslider -->
	<link rel="stylesheet" href="asset/css/flexslider.css" type="text/css" media="screen" />

	<script src="asset/js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
	
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
	<script src="asset/js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

	<script>
		$("#modalMasuk").on("keydown",function(e){
			let keyCode = e.which || e.keyCode;
			if(keyCode == 13) // enter key code
			{
				ceklogin();
			}
		})
		// $("#modalDaftar").on("keydown",function(e){
		// 	let keyCode = e.which || e.keyCode;
		// 	if(keyCode == 13) // enter key code
		// 	{
		// 		cekregister();
		// 	}
		// })
	</script>

	<!-- ceklogin -->
	<script>
		function ceklogin() {
			let username = $('#inputUsername').val()
			let password = $('#inputPassword').val()

			let admin = './admin/index.php'
			let user = './'
			let keranjang = './cart.php'

			$('#btnLogin').attr('value','Silahkan tunggu ...')
			$.ajax({
				url		: './auth/ceklogin.php',
				data	: 'username='+username+'&password='+password,
				type	: 'POST',
				dataType: 'html',
				success	: function(pesan){
					if(pesan=='admin'){
						window.location = admin;
					} else if (pesan=='keranjang') {
						window.location = keranjang;
					} else if (pesan=='user') {
						window.location = user;
					} else{
						alert(pesan);
						$('#btnLogin').attr('value','Coba lagi ...');
					}
				},
			});
		}
	</script>
	<!-- //ceklogin -->

	<!-- cekregister -->
	<script>
		function cekregister() {
			let nama 		= $('#nama').val()
			let username 	= $('#username').val()
			let password 	= $('#password').val()
			let konfirmasi_password 	= $('#konfirmasi_password').val()

			let user 		= './'
			let keranjang 	= './checkout.php'

			$('#btnDaftar').attr('value','Silahkan tunggu ...')
			$.ajax({
				url		: './auth/cekregister.php',
				data	: 'nama='+nama+'&username='+username+'&password='+password+'&konfirmasi_password='+konfirmasi_password,
				type	: 'POST',
				dataType: 'html',
				success	: function(pesan){
					if(pesan=='keranjang'){
						window.location = keranjang;
					} else if (pesan=='user') {
						window.location = user;
					} else if (pesan=='nama') {
						alert('Nama lengkap harap diisi!')
						$('#btnDaftar').attr('value','Coba lagi ...')
					} else if (pesan=='username') {
						alert('Username harap diisi!')
						$('#btnDaftar').attr('value','Coba lagi ...')
					} else if (pesan=='password') {
						alert('Password harap diisi!')
						$('#btnDaftar').attr('value','Coba lagi ...')
					} else if (pesan=='konfirmasi_password') {
						alert('Password tidak sama!')
						$('#btnDaftar').attr('value','Coba lagi ...')
					} else {
						// alert(pesan);
						// $('#btnDaftar').attr('value','Coba lagi ...');
					}
				},
			});
		}
	</script>
	<!-- //cekregister -->

	<!-- addtocart -->
	<script>
		function addtocart(id_produk) {
		    let inputQuantityElement = $("#input-qty-"+id_produk)
				    
		    let newQuantity = parseInt($(inputQuantityElement).val())+1
		    console.log(newQuantity)
		    add_to_cart(id_produk, newQuantity)
		}

		function add_to_cart(id_produk, new_quantity){
			let shoppingcart = $("#shoppingcart")
		    $.ajax({
				url : "tambahcart.php",
				data : "id_produk="+id_produk+"&new_quantity="+new_quantity,
				type : 'post',
				success : function(response) {
					$( "#angkacart" ).load(window.location.href + " #shoppingcart")
				}
			});
		}
	</script>
	<!-- //addtocart -->

	<!-- updatecart -->
	<script>
		function increment_quantity(id_produk) {
		    let inputQuantityElement = $("#input-quantity-"+id_produk)
		    let newQuantity = parseInt($(inputQuantityElement).val())+1
		    update_to_cart(id_produk, newQuantity)
		}

		function decrement_quantity(id_produk) {
		    let inputQuantityElement = $("#input-quantity-"+id_produk)
		    if($(inputQuantityElement).val() > 1) 
		    {
		    let newQuantity = parseInt($(inputQuantityElement).val()) - 1
		    update_to_cart(id_produk, newQuantity)
		    }
		}

		function update_to_cart(id_produk, new_quantity) {
			let inputQuantityElement = $("#input-quantity-"+id_produk)
		    $.ajax({
				url : "qty.php",
				data : "id_produk="+id_produk+"&new_quantity="+new_quantity,
				type : 'post',
				success : function(response) {
					$(inputQuantityElement).val(new_quantity)
				}
			});
		}
	</script>
	<!-- //updatecart -->
</body>

</html>