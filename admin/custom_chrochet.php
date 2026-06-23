<?php
include "../koneksi.php";

$sql = "
SELECT
    cc.*,
    u.full_name,
    u.email,
    u.phone_number,
    u.address
FROM frm_crochet cc
LEFT JOIN users u
ON cc.id_users = u.id_users
ORDER BY cc.id DESC
";

$query = mysqli_query($conn, $sql);
?>

<link rel="stylesheet" href="../css/orders.css">

<h2>Data Custom Crochet</h2>

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

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
    <th>ID</th>
    <th>ID User</th>
    <th>Customer</th>
    <th>Email</th>
    <th>No. Telepon</th>
    <th>Alamat</th>
    <th>Product Type</th>
    <th>Deadline</th>
    <th>Size</th>
    <th>Color</th>
    <th>Budget</th>
    <th>Special Request</th>
    <th>Quantity</th>
    <th>Order Date</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($query)){ ?>
    <tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['id_users']; ?></td>
    <td><?= $row['full_name']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['phone_number']; ?></td>
    <td><?= $row['address']; ?></td>
    <td><?= $row['product_type']; ?></td>
    <td><?= $row['deadline']; ?></td>
    <td><?= $row['size']; ?></td>
    <td><?= $row['color']; ?></td>
    <td>Rp <?= number_format($row['budget'],0,',','.'); ?></td>
    <td><?= $row['special_request']; ?></td>
    <td><?= $row['quantity']; ?></td>
    <td><?= $row['order_date']; ?></td>
    </tr>
<?php } ?>

</table>