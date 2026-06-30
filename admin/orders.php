<?php
include "../koneksi.php";

$sql = "
SELECT
    c.*,
    u.full_name,
    p.name AS product_name
FROM checkout c
JOIN users u
ON c.id_users = u.id_users
JOIN product p
ON c.product_id = p.id
ORDER BY c.id DESC
";

$query = mysqli_query($conn,$sql);
?>

<link rel="stylesheet" href="../css/orders.css">
<h2 align="center">Data Pesanan</h2>

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

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>ID User</th>
        <th>Customer</th>
        <th>ID Produk</th>
        <th>Produk</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['id_users'] ?></td>
    <td><?= $row['full_name'] ?></td>
    <td><?= $row['product_id'] ?></td>
    <td><?= $row['product_name'] ?></td>
    <td><?= $row['qty'] ?></td>

    <td>
        Rp <?= number_format($row['subtotal'],0,',','.') ?>
    </td>

    <td>
        <span class="badge <?= strtolower($row['status']) ?>">
        <?= $row['status'] ?>
        </span>
    </td>

    <td>

        <div class="status-action">

        <a href="update_status.php?id=<?= $row['id'] ?>&status=Pending"
        class="status-btn pending">
        Pending
        </a>

        <a href="update_status.php?id=<?= $row['id'] ?>&status=Diproses"
        class="status-btn diproses">
        Diproses
        </a>

        <a href="update_status.php?id=<?= $row['id'] ?>&status=Dikirim"
        class="status-btn dikirim">
        Dikirim
        </a>

        <a href="update_status.php?id=<?= $row['id'] ?>&status=Selesai"
        class="status-btn selesai">
        Selesai
        </a>

        <a href="update_status.php?id=<?= $row['id'] ?>&status=Dibatalkan"
        class="status-btn batal">
        Batal
        </a>

        </div>

</td>

</tr>

<?php } ?>

</table>