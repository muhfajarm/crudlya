<?php 
    include "../config/koneksi.php";
    $sql = "SELECT * FROM produk p, kategori k WHERE p.kategori_id=k.id_kategori ORDER BY id_produk DESC";
    $query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Berat</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Gambar</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?= $no ?></td>
            <td>
                <?= $data["nama_produk"];?><br>
                <span>Kategori : <?= $data["nama_kategori"];?></span><br>
                <span>Slug : <?= $data["slug_produk"];?></span>
            </td>
            <td><?= $data["deskripsi"];?></td>
            <td><?= $data["harga"];?></td>
            <td><?= $data["stok"];?></td>
            <td><?= $data["berat"];?></td>
            <td><?= $data["tgl_masuk"];?></td>
            <td><?= "<img src='../asset/img/produk/$data[gambar]' width='70' height='90'" ;?></td>
            <td><?= $data["status"];?></td>
            <td>
                <a href="halaman/produk/delete.php?id=<?= $data['id_produk'];?>" class="btn btn-danger btn-sm">Delete</a> |
                <a href="halaman/produk/edit.php?id=<?= $data['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</div>
<div>
    <a class="btn btn-primary pull-right" href="halaman/produk/form.php" role="button">+ Tambah produk</a>
</div>