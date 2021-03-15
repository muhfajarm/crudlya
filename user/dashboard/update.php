<?php
	include "./../../config/koneksi.php";
	session_start();
	$username = $_SESSION['username'];
	if ($_POST['edatadiri']) {
		$nama	= $_POST['nama'];
		$no_hp	= $_POST['no_hp'];
		$alamat	= $_POST['alamat'];

		$sql	= "UPDATE users SET nama='$nama', no_hp='$no_hp', alamat='$alamat' WHERE username='$username'";
	 	$result = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
	 	echo "<script>location='./../../user.php?p=dashboard&username=$username'</script>";
	}
?>