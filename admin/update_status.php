<?php
include "../koneksi.php";

$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query(
    $conn,
    "UPDATE checkout
     SET status='$status'
     WHERE id='$id'"
);

header("Location: orders.php");