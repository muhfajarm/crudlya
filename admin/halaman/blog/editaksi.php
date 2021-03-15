<?php
	include "../../../config/koneksi.php";

	$id_blog= $_POST['id_blog'];
	$kategori_id = $_POST['kategori_id'];
	$username = $_POST['username'];
	$judul = $_POST['judul'];
	$judul_seo= $_POST['judul_seo'];
	$pilihan = $_POST['pilihan'];
	$isi_blog = $_POST['isi_blog'];
	$hari = $_POST['hari'];
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
	$gambar = $_POST['gambar'];
	$dibaca = $_POST['dibaca'];
	$tag= $_POST['tag'];

	$sql = "UPDATE blog SET kategori_id='$kategori_id', username='$username',judul='$judul',judul_seo='$judul_seo',pilihan='$pilihan',isi_blog='$isi_blog',hari='$hari',tanggal='$tanggal',jam='$jam',gambar='$gambar',dibaca='$dibaca',tag='$tag' WHERE id_blog='$id_blog'";

	$result = mysqli_query($koneksi, $sql);

	if ($result){
		header ("location:../../index.php?page=blog");
	} else {
		echo "Terjadi kesalahan";
	}
?>