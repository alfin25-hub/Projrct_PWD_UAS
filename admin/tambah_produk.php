<?php
include "../koneksi.php";

if(isset($_POST['simpan'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "../images/".$photo
    );

    mysqli_query($conn,"
        INSERT INTO product
        (name,price,category,description,photo)
        VALUES
        ('$name','$price','$category','$description','$photo')
    ");

    header("Location: products.php");
}
?>

<h2>Tambah Produk</h2>
<link rel="stylesheet" href="../css/tambah_prduk.css">

<form method="POST" enctype="multipart/form-data">

    Nama Produk<br>
    <input type="text" name="name" required>
    <br><br>

    Harga<br>
    <input type="number" name="price" required>
    <br><br>

    Kategori<br>
    <input type="text" name="category" required>
    <br><br>

    Deskripsi<br>
    <textarea name="description"></textarea>
    <br><br>

    Foto<br>
    <input type="file" name="photo" required>
    <br><br>

    <button name="simpan">
        Simpan
    </button>

</form>