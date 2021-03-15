<html>
  <head>
    <title>Dashboard | Tambah</title>
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../asset/css/form.css">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h1 class="lead"> Tambah Data </h1>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <form action="insert.php" method="post" class="needs-validation">
		        <div class="row">
              <div class="col-md-12 mb-3">
                <label>kategori_id : </label>
                <input type="text" class="form-control" name="kategori_id">
              </div>
              <div class="col-md-12 mb-3">
                <label>username : </label>
                <input type="text" class="form-control" name="username">
              </div>
              <div class="col-md-12 mb-3">
                <label>judul : </label>
                <input type="text" class="form-control" name="judul">
              </div>
              <div class="col-md-12 mb-3">
                <label>judul_seo : </label>
                <input type="text" class="form-control" name="judul_seo">
              </div>
              <div class="col-md-12 mb-3">
                <label>pilihan : </label>
                <input type="text" class="form-control" name="pilihan">
              </div>
              <div class="col-md-12 mb-3">
                <label>isi_blog : </label>
                <input type="text" class="form-control" name="isi_blog">
              </div>
              <div class="col-md-12 mb-3">
                <label>hari : </label>
                <input type="text" class="form-control" name="hari">
              </div>
              <div class="col-md-12 mb-3">
                <label>tanggal : </label>
                <input type="date" class="form-control" name="tanggal">
              </div>
              <div class="col-md-12 mb-3">
                <label>jam: </label>
                <input type="time" class="form-control" name="jam">
              </div>
              <div class="col-md-12 mb-3">
                <label>gambar : </label>
                <input type="text" class="form-control" name="gambar">
              </div>
              <div class="col-md-12 mb-3">
                <label>dibaca : </label>
                <input type="text" class="form-control" name="dibaca">
              </div>
              <div class="col-md-12 mb-3">
                <label>tag : </label>
                <input type="text" class="form-control" name="tag">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>
            <br>
            <a href="../../index.php?page=blog">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="./asset/js/jquery-3.4.1.min.js"></script>
    <script src="./asset/js/bootstrap.bundle.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
  </body>
</html>