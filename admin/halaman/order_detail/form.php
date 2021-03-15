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
              <div class="col-md-8 mb-3">
                <label>orders_id : </label>
                <input type="text" class="form-control" name="orders_id">
              </div>
              <div class="col-md-4 mb-3">
                <label>produk_id : </label>
                <input type="text" class="form-control" name="produk_id">
              </div>
              <div class="col-md-4 mb-3">
                <label>jumlah : </label>
                <input type="text" class="form-control" name="jumlah">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>
            <br>
            <a href="../../index.php?page=order_detail">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="./asset/js/jquery-3.4.1.min.js"></script>
    <script src="./asset/js/bootstrap.bundle.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
  </body>
</html>