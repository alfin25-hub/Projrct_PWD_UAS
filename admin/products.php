<?php
include "../koneksi.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM product ORDER BY id DESC"
);
?>

<link rel="stylesheet" href="../css/produk.css">

<h2>Data Produk</h2>

<a href="dashboard.php"
   style="
    display:inline-block;
    margin-bottom:15px;
    padding:10px 15px;
    background:#007bff;
    color:white;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
   ">
   ⬅️Kembali ke Dashboard
</a>

<a href="tambah_produk.php" class="btn-tambah">
    ➕ Tambah Produk
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Foto</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Kategori</th>
    <th>Deskripsi</th>
    <th>Aksi</th>
</tr>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td>
    <img src="../images/<?= $row['photo'] ?>" width="80">
</td>

<td><?= $row['name'] ?></td>

<td>
    Rp <?= number_format($row['price'],0,',','.') ?>
</td>

<td><?= $row['category'] ?></td>

<td>
    <?= nl2br($row['description']) ?>
<td>

<a href="edit_produk.php?id=<?= $row['id'] ?>"
   class="btn-edit">
   ✏️ Edit
</a>

<a href="hapus_produk.php?id=<?= $row['id'] ?>"
   class="btn-hapus"
   onclick="return confirm('Hapus produk?')">
   🗑 Hapus
</a>

</td>

</td>

</tr>

<?php } ?>

</table>