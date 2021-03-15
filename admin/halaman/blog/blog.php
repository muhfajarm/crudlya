<?php 
	include "../config/koneksi.php";
	$sql = "SELECT * FROM  blog ORDER BY id_blog DESC";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">id_blog</th>
            <th scope="col">kategori_id</th>
            <th scope="col">username</th>
            <th scope="col">judul</th>
            <th scope="col">judul_seo</th>
            <th scope="col">pilihan</th>
            <th scope="col">isi_blog</th>
            <th scope="col">hari</th>
            <th scope="col">tanggal</th>
            <th scope="col">jam</th>
            <th scope="col">gambar</th>
            <th scope="col">dibaca</th>
            <th scope="col">tag</th>
            <th scope="col">Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?php echo $no ?></td>
            <td><?php echo $data["id_blog"];?></td>
            <td><?php echo $data["kategori_id"];?></td>
            <td><?php echo $data["username"];?></td>
            <td><?php echo $data["judul"];?></td>
            <td><?php echo $data["judul_seo"];?></td>
            <td><?php echo $data["pilihan"];?></td>
            <td><?php echo $data["isi_blog"];?></td>
            <td><?php echo $data["hari"];?></td>
            <td><?php echo $data["tanggal"];?></td>
            <td><?php echo $data["jam"];?></td>
            <td><?php echo $data["gambar"];?></td>
            <td><?php echo $data["dibaca"];?></td>
            <td><?php echo $data["tag"];?></td>
            <td>
                <a href="halaman/blog/delete.php?id=<?php echo $data['id_blog'];?>">Delete</a> |
                <a href="halaman/blog/edit.php?id=<?php echo $data['id_blog']; ?>">Edit</a>
            </td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</div>
<div>
    <a class="btn btn-primary pull-right" href="halaman/blog/form.php" role="button">+ Tambah Blog</a>
</div>