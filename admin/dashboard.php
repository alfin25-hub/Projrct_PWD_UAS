<?php
session_start();

include 'header.php';

include "../security/security.php";

include "../security/admin_auth.php";

include "../security/session.php";

if(
    !isset($_SESSION['role']) ||
    $_SESSION['role'] != 'admin'
){
    header("Location: ../login.php");
    exit;
}

include "../koneksi.php";

$totalProduk = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM product")
);

$totalUser = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM users")
);

// Total pesanan selain yang dibatalkan
$totalOrder = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
         FROM checkout
         WHERE status != 'Dibatalkan'"
    )
);

// Total pendapatan hanya dari pesanan selesai
$totalPendapatan = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT SUM(subtotal) AS total
         FROM checkout
         WHERE status = 'Selesai'"
    )
);
?>
<br>
<head>
    <title>👥 Dashboard Admin</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>

<h1 align="center">👥 Dashboard Admin</h1>

<div class="card-container">

    <div class="card">
        <h2><?= $totalProduk ?></h2>
        <p>Total Produk</p>
    </div>

    <div class="card">
        <h2><?= $totalUser ?></h2>
        <p>Total User</p>
    </div>

    <div class="card">
        <h2><?= $totalOrder['total'] ?></h2>
        <p>Total Pesanan</p>
    </div>

    <div class="card">
        <h2>
            Rp <?= number_format($totalPendapatan['total'] ?? 0, 0, ',', '.') ?>
        </h2>
        <p>Total Pendapatan</p>
    </div>

</div>

<div class="menu-btn">
    <a href="products.php">🧸 Kelola Produk</a>
    <a href="orders.php">🛍️ Kelola Pesanan</a>
    <a href="custom_accessories.php">📋 Kelola Custom Accessories</a>
    <a href="custom_chrochet.php">🧶 Kelola Custom Chrochet</a>
    <a href="users.php">🗿 Data User</a>
    <a href="../logout.php">🗿 Logout</a>
</div>

</body>