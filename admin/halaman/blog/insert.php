<?php
	//koneksi data base
	include '../../../config/ko
	neksi.php';

	//menyimpan data
	$kategori_id = $_POST['kategori_id'];
	$username = $_POST['username'];
	$judul = $_POST['judul'];
	$judul_seo = $_POST['judul_seo'];
	$pilihan = $_POST['pilihan'];
	$isi_blog = $_POST['isi_blog'];
	$hari = $_POST['hari'];
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
	$gambar = $_POST['gambar'];
	$dibaca = $_POST['dibaca'];
	$tag = $_POST['tag'];

	//membuat query untuk menyimpan
	$sql= "INSERT INTO  blog
	 VALUES ('','$kategori_id','$username','$judul','$judul_seo','$pilihan','$isi_blog','$hari','$tanggal','$jam','$gambar','$dibaca','$tag')";

	//menyimpan data ke database
	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=blog");
	} else {
		echo "Terjadi kesalahan";
	}
?>