<?php 
	if(isset($_GET['page'])){
		if ($_GET['page']=="kategori") {
			include 'halaman/kategori/kategori.php';
		}elseif ($_GET['page']=="produk") {
			include "halaman/produk/produk.php";
		}elseif ($_GET['page']=="users") {
			include "halaman/users/users.php";
		}elseif ($_GET['page']=="order") {
			include "halaman/orders/orders.php";
		}elseif ($_GET['page']=="konfirmasi") {
			include "halaman/orders/konfirmasi.php";
		}elseif ($_GET['page']=="detail") {
			include "halaman/orders/detail.php";
		}elseif ($_GET['page']=="laporan") {
			include "halaman/orders/laporan.php";
		}else{
			echo "<center><h3>Maaf. Halaman tidak di temukan!</h3></center>";
		}
	}
?>