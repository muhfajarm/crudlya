<?php
	include "./config/koneksi.php";
	session_start();
	$username = $_SESSION['username'];
  	if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){
    	echo "<script>alert('Harap masuk atau mendaftar terlebih dahulu');</script>";
    	echo "<script>location='./../';</script>";
  	}

	$id_order = $_GET['id'];
	$sql_konfirmasi = "UPDATE orders SET status_order='Diterima' WHERE id_order='$id_order'";
 	$Qkonfirmasi = mysqli_query($koneksi, $sql_konfirmasi) or die("select data menu error :".mysql_error());
 	echo "<script>location='./user.php?p=riwayat&username=$username'</script>";
?>