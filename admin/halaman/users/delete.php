<?php
	include "../../../config/koneksi.php";

	$id = $_GET['id'];
	$sql = "DELETE FROM users WHERE id='$id'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=users");
	} else {
		echo "Terjadi kesalahan";
	}
?>