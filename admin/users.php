<?php
include "../koneksi.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM users ORDER BY id_users DESC"
);
?>

<link rel="stylesheet" href="../css/orders.css">

<h2 align="center">Data User Terdaftar</h2>

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
    <th>ID_Users</th>
    <th>Nama Lengkap</th>
    <th>Email</th>
    <th>Password</th>
    <th>No. Telepon</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)){ ?>

<tr>
    <td><?= $row['id_users'] ?></td>
    <td><?= $row['full_name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['password'] ?></td>
    <td><?= $row['phone_number'] ?></td>
    <td><?= $row['role'] ?? 'customer' ?></td>

    <td>
        <a href="hapus_user.php?id=<?= $row['id_users'] ?>"
           onclick="return confirm('Yakin ingin menghapus akun ini?')"
           style="
                background:red;
                color:white;
                padding:6px 10px;
                text-decoration:none;
                border-radius:5px;
           ">
           Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>