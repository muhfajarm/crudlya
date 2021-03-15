<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>MD Audio | 
    <?php
        if($_GET['p']=="dashboard"){ echo "Dashboard";}
        else if($_GET['p']=="riwayat"){ echo "Riwayat";}
        else if($_GET['p']=="nota"){ echo "Nota";}
        else if($_GET['p']=="pembayaran"){ echo "Input Pembayaran";}
        else if($_GET['p']=="lihatpembayaran"){ echo "Lihat Pembayaran";}
        else { echo ""; }
    ?>
  </title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8" />
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- //Meta tag Keywords -->

  <!-- Custom-Files -->
  <link href="./asset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <!-- Bootstrap css -->
  <link href="./asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!-- Main css -->
  <link rel="stylesheet" href="./asset/css/fontawesome-all.css">
  <!-- Font-Awesome-Icons-CSS -->
  <link href="./asset/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
  <!-- pop-up-box -->
  <link href="./asset/css/menu.css" rel="stylesheet" type="text/css" media="all" />
  <!-- menu style -->
  <!-- //Custom-Files -->

  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
      rel="stylesheet">
  <!-- //web fonts -->

</head>

<body>
  <div class="agile-main-top">
    <div class="container-fluid">
      <div class="row main-top-w3l py-2">
        <div class="col-lg-12 header-right mt-lg-0 mt-2">
          <!-- header lists -->
          <?php session_start(); ?>
          <?php if (isset($_SESSION["users"])): ?>
            <ul class="nav-item dropdown float-right">
                <a class="btn btn-sm btn-info dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['username']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 4px; left: auto;">
                  <a class="dropdown-item" href="./user.php?p=dashboard&username=<?=$_SESSION['username'];?>">Dashboard</a>
                  <a class="dropdown-item" href="./user.php?p=riwayat&username=<?=$_SESSION['username'];?>">Riwayat</a>
                  <a class="dropdown-item" href="./auth/logout.php">Keluar</a>
                </div>
              </ul>
          <?php else: ?>
          <?php endif ?>
          <!-- //header lists -->
        </div>
      </div>
    </div>
  </div>
  <!-- page -->
  <div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
      <div class="container">
        <ul class="w3_short">
          <li>
            <a href="./">Home</a>
            <i>|</i>
          </li>
          <li>
            <?php
              $url = './user.php?p=riwayat&username='.$_SESSION['username'];
              if($_GET['p']=="dashboard"){ echo "dashboard";}
                else if($_GET['p']=="riwayat"){ echo "riwayat";}
                if ($_GET['p']=="nota") {
                  echo "<a href='".$url."'>riwayat</a>";
                  echo "<i>|</i>";
                  echo "Nota";
                } elseif ($_GET['p']=="pembayaran") {
                  echo "<a href='".$url."'>riwayat</a>";
                  echo "<i>|</i>";
                  echo "input pembayaran";
                } elseif ($_GET['p']=="lihatpembayaran") {
                  echo "<a href='".$url."'>riwayat</a>";
                  echo "<i>|</i>";
                  echo "lihat pembayaran";
                }
             else { echo ""; }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- //page -->
  <section class="mt-5 mb-5">
    <?php include "./user/page.php"; ?>
  </section>

  <?php include "layouts/footer.php"; ?>
</body>
</html>