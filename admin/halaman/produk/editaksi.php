<?php
	include "../../../config/koneksi.php";

	$id_produk = $_POST['id_produk'];
	$kategori_id = $_POST['kategori_id'];
	$nama_produk = $_POST['nama_produk'];
	$slug = '';
	$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["nama_produk"])));
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$berat = $_POST['berat'];
	$tgl_masuk= $_POST['tgl_masuk'];
	$status = $_POST['status'];

	$nama_file = $_FILES["gambar"]["name"];
 	$direktori = $_FILES["gambar"]["tmp_name"];
 	$file = date('YmdHis').$nama_file;
 	$t = move_uploaded_file($direktori, "../../../asset/img/produk/$file");

    if(empty($filename)) {
    	$sql = "UPDATE produk SET kategori_id='$kategori_id',nama_produk='$nama_produk', slug_produk='$slug',deskripsi='$deskripsi',harga='$harga',stok='$stok',berat='$berat',tgl_masuk='$tgl_masuk',status='$status' WHERE id_produk='$id_produk'";
    
    	$result = mysqli_query($koneksi, $sql);
    
    	if ($result){
    		header ("location:../../index.php?page=produk");
    	} else {
    		echo "Terjadi kesalahan";
    	}
    }elseif (!empty($filename)){
        $sql = "UPDATE produk SET kategori_id='$kategori_id',nama_produk='$nama_produk', slug_produk='$slug',deskripsi='$deskripsi',harga='$harga',stok='$stok',berat='$berat',tgl_masuk='$tgl_masuk',gambar='$file',status='$status' WHERE id_produk='$id_produk'";
    
    	$result = mysqli_query($koneksi, $sql);
    
    	if ($result){
    		header ("location:../../index.php?page=produk");
    	} else {
    		echo "Terjadi kesalahan";
    	}
    }
?>