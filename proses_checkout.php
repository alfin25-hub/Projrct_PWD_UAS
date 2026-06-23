<?php
session_start();
include "koneksi.php";

// CEK LOGIN
if (!isset($_SESSION['id_users'])) {
    echo "login";
    exit;
}

$id_users = $_SESSION['id_users'];

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$subtotal = $_POST['subtotal'];

$sql = "INSERT INTO checkout
(product_name, full_name, phone, address, qty, price, subtotal, id_users, product_id)
VALUES
('$product_name','$full_name','$phone','$address','$qty','$price','$subtotal','$id_users','$product_id')";

if(mysqli_query($conn,$sql)){

    echo "success";

}else{

    echo "error";

}
?>