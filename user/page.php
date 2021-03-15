<?php 
	if(isset($_GET['p'])){
		if ($_GET['p']=="dashboard") {
			include 'dashboard/index.php';
		} elseif ($_GET['p']=="riwayat") {
			include "riwayat/index.php";
		} elseif ($_GET['p']=="nota") {
			include "riwayat/nota.php";
		} elseif ($_GET['p']=="pembayaran") {
			include "riwayat/pembayaran.php";
		} elseif ($_GET['p']=="lihatpembayaran") {
			include "riwayat/lihat_pembayaran.php";
		} elseif ($_GET['p']=="diterima") {
			include "riwayat/diterima.php";
		} else {
			echo "<center><h3>Maaf. Halaman tidak di temukan!</h3></center>";
		}
	}
?>