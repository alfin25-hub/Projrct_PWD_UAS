<?php
include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM product WHERE id='$id'"
    )
);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    if($_FILES['photo']['name'] != ""){

        $photo = $_FILES['photo']['name'];

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "../images/".$photo
        );

        mysqli_query($conn,"
            UPDATE product
            SET
            name='$name',
            price='$price',
            category='$category',
            description='$description',
            photo='$photo'
            WHERE id='$id'
        ");

    }else{

        mysqli_query($conn,"
            UPDATE product
            SET
            name='$name',
            price='$price',
            category='$category',
            description='$description'
            WHERE id='$id'
        ");
    }

    header("Location: products.php");
}
?>
<h2 align= "center">Edit Produk</h2>
<link rel="stylesheet" href="../css/edit_produk.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<form method="POST" enctype="multipart/form-data">

    Nama Produk<br>
    <input
        type="text"
        name="name"
        value="<?= $data['name'] ?>">
    <br><br>

    Harga<br>
    <input
        type="number"
        name="price"
        value="<?= $data['price'] ?>">
    <br><br>

    Kategori<br>
    <input
        type="text"
        name="category"
        value="<?= $data['category'] ?>">
    <br><br>

    Deskripsi<br>
    <textarea name="description"><?= $data['description'] ?></textarea>
    <br><br>

    Foto Baru<br>
    <input type="file" name="photo">
    <br><br>

    <button name="update">
        Update
    </button>

</form>