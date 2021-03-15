<?php
	include "../../../config/koneksi.php";

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password'])


	;
	$level = $_POST['level'];

	$sql = "UPDATE users SET nama='$nama', username='$username',password='$password',level='$level' WHERE id='$id'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=users");
	} else {
		echo "Terjadi kesalahan";
	}
?>