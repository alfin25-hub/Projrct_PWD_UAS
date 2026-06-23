<?php
session_start();

if (!isset($_SESSION['id_users'])) {
    header("Location: home.php");
    exit;
}

if ($_SESSION['role'] == 'admin') {
    header("Location: admin/dashboard.php");
    exit;
}

header("Location: home.php");
exit;
?>