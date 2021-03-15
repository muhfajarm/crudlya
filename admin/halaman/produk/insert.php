<?php
	//koneksi data base
	include '../../../config/koneksi.php';

	//menyimpan data
	$kategori_id = $_POST['kategori_id'];
	$nama_produk = $_POST['nama_produk'];
	$slug = '';
	$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["nama_produk"])));
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$berat = $_POST['berat'];
	$tgl_masuk= $_POST['tgl_masuk'];
	$status = $_POST['status'];

	$nama_file = $_FILES["gambar"]["name"];
 	$direktori = $_FILES["gambar"]["tmp_name"];
 	$file = date('YmdHis').$nama_file;
 	$t = move_uploaded_file($direktori, "../../../asset/img/produk/$file");
	

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  produk
	 VALUES (NULL,'$kategori_id','$nama_produk','$slug','$deskripsi','$harga','$stok','$berat','$tgl_masuk','$file','$status')";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=produk");
	} else {
		echo "Terjadi kesalahan";
	}
?>