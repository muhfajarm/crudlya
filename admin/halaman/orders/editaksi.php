<?php
	include "../../../config/koneksi.php";

	$id_order = $_POST['id_order'];
	$nama_kustomer = $_POST['nama_kustomer'];
	$alamat = $_POST['alamat'];
	$telpon = $_POST['telpon'];
	$email = $_POST['email'];
	$tgl_order = $_POST['tgl_order'];
	

	$sql = "UPDATE orders SET nama_kustomer='$nama_kustomer', alamat='$alamat',telpon='$telpon',email='$email',tgl_order='$tgl_order' WHERE id_order='$id_order'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=order");
	} else {
		echo "Terjadi kesalahan";
	}
?>