<?php
	include "./config/koneksi.php";
session_start();
	$id_produk = $_POST['id_produk'];

	if (isset($_SESSION['keranjang'][$id_produk])) {
		$_SESSION['keranjang'][$id_produk] = $_POST["new_quantity"];
	}
?>