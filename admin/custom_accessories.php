<?php
include "../koneksi.php";

$sql = "
SELECT
    fa.*,
    u.full_name,
    u.email,
    u.phone_number,
    u.address
FROM frm_accessories fa
LEFT JOIN users u
ON fa.id_users = u.id_users
ORDER BY fa.id_frm_acc DESC
";

$query = mysqli_query($conn, $sql);
?>


<link rel="stylesheet" href="../css/orders.css">

<h2>Data Form Accessories</h2>

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
    <th>ID Form</th>
    <th>ID User</th>
    <th>Customer</th>
    <th>Email</th>
    <th>No. Telepon</th>
    <th>Alamat</th>
    <th>Jenis Produk</th>
    <th>Deadline</th>
    <th>Size</th>
    <th>Jenis Benang</th>
    <th>Warna Produk</th>
    <th>Permintaan Khusus</th>
    <th>Qty</th>
    <th>Tanggal Order</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($query)){ ?>
    <tr>
        <td><?= $row['id_frm_acc'] ?></td>
        <td><?= $row['id_users'] ?></td>
        <td><?= $row['full_name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone_number'] ?></td>
        <td><?= $row['address'] ?></td>
        <td><?= $row['product_type'] ?></td>
        <td><?= $row['deadline'] ?></td>
        <td><?= $row['size'] ?></td>
        <td><?= $row['yarn_type'] ?></td>
        <td><?= $row['product_color'] ?></td>
        <td><?= $row['special_request'] ?></td>
        <td><?= $row['quantity'] ?></td>
        <td><?= $row['order_date'] ?></td>
    </tr>

<?php } ?>

</table>
