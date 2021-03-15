<?php
	include "../../../config/koneksi.php";

	$id_order = $_GET['id'];
	$sql = "DELETE FROM orders WHERE id_order='$id_order'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=order");
	} else {
		echo "Terjadi kesalahan";
	}
?>