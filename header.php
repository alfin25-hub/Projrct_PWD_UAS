<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$full_name = isset($_SESSION['full_name'])
    ? $_SESSION['full_name']
    : 'Guest';
?>

<link rel="stylesheet" href="css/header.css">

<header class="navbar">
<nav>

<div class="left-header">

    <div class="logo">
        <a href="home.php">
        <img src="images/logo/logo.png" width="150">
        </a>
    </div>

    <div class="welcome" >
        Welcome, <?= htmlspecialchars($full_name); ?> !!😊
    </div>

</div>

<div class="menu">
    <a href="home.php">🏚️Home</a>
    <a href="shop.php">🛍️Shop</a>
    <a href="custom.php">📃Custom</a>

    <?php if(isset($_SESSION['id_users'])): ?>
        <a href="logout.php">👤Logout</a>
    <?php else: ?>
        <a href="login.php">👤Login</a>
    <?php endif; ?>
</div>

</nav>
</header>