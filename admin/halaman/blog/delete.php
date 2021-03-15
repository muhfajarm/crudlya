<?php
	include "../../../config/koneksi.php";

	$id_blog = $_GET['id'];
	$sql = "DELETE FROM blog WHERE id_blog='$id_blog'";
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=blog");
	} else {
		echo "Terjadi kesalahan";
	}
?>