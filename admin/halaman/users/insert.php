<?php
	//koneksi data base
	include '../../../config/koneksi.php';

	//menyimpan data
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$level = $_POST['level'];

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  users VALUES (NULL,NULL,'$nama','$username',NULL,NULL,'$password','$level')";
	 
	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=users");
	} else {
		echo "Terjadi kesalahan";
	}
?>