<?php
   include "../../../config/koneksi.php";
   $id_produk = $_GET['id'];
   $sql = "SELECT * FROM produk p, kategori k WHERE id_produk='$id_produk'";
   $result = mysqli_query($koneksi, $sql);
   $dt = mysqli_fetch_array($result);
?>
<html>
  <head>
    <title>Dashboard | Edit</title>
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../asset/css/form.css">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h1 class="lead"> Edit Data </h1>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <form action="editaksi.php" method="post" class="needs-validation" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $dt['id_produk'];?>" name="id_produk">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label>Nama produk : </label>
                <input type="text" class="form-control" name="nama_produk" value="<?php echo $dt['nama_produk'];?>">
              </div>
              <div class="col-md-12 mb-3">
                <label>Kategori : </label>
                <select class="form-control" name="kategori_id">
                  <?php foreach ($result as $data): ?>
                    <option value="<?= $data["id_kategori"];?>"><?= $data["nama_kategori"];?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col-md-12 mb-3">
                <label>deskripsi : </label>
                <input type="text" class="form-control" name="deskripsi" value="<?php echo $dt['deskripsi'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>harga : </label>
                <input type="text" class="form-control" name="harga" value="<?php echo $dt['harga'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>stok : </label>
                <input type="text" class="form-control" name="stok" value="<?php echo $dt['stok'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>berat : </label>
                <input type="text" class="form-control" name="berat" value="<?php echo $dt['berat'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>tanggal masuk : </label>
                <input type="date" class="form-control" name="tgl_masuk" value="<?php echo $dt['tgl_masuk'];?>">
              </div>
              <div class="col-md-8 mb-3">
                <label>gambar : </label><br>
                <img class="img-thumbnail" src="../../../asset/img/produk/<?= $dt['gambar'];?>"><br>
                <input type="file" class="form-control" name="gambar" value="<?= $dt['gambar'];?>">
              </div>
              <div class="col-md-12 mb-3">
                <label>Status : </label>
                <select name="status">
                  <option value="Baru">Baru</option>
                  <option value="Bekas">Bekas</option>
                </select>
                <!-- <input type="text" class="form-control" name="dibeli"> -->
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="../../index.php?page=produk">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="../../../asset/js/jquery-3.4.1.min.js"></script>
    <script src="../../../asset/js/bootstrap.bundle.js"></script>
    <script src="../../../asset/js/bootstrap.min.js"></script>
  </body>
</html>