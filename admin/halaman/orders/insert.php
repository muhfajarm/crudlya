<?php
	//koneksi data base
	include '../../../config/koneksi.php';

	//menyimpan data
	
	$nama_kustomer = $_POST['nama_kustomer'];
	$alamat = $_POST['alamat'];
	$telpon = $_POST['telpon'];
	$email = $_POST['email'];
	$status_order = $_POST['status_order'];
	$tgl_order = $_POST['tgl_order'];
	$id_kota = $_POST['id_kota'];

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  orders
	 VALUES ('','$nama_kustomer','$alamat','$telpon','$email','$status_order', '$tgl_order','$id_kota')";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=order");
	} else {
		echo "Terjadi kesalahan";
	}
?>