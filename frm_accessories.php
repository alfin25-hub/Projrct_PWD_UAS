<?php
include 'header.php';
include "koneksi.php";

// Cek login
if(!isset($_SESSION['id_users'])){
    echo "
    <script>
        alert('Silakan login terlebih dahulu!');
        window.location.href='login.php';
    </script>";
    exit();
}

if(isset($_POST['checkout'])){

    $jenis      = $_POST['jenis'];
    $deadline   = $_POST['deadline'];
    $ukuran     = $_POST['ukuran'];
    $benang     = $_POST['benang'];
    $warna      = $_POST['warna'];
    $request    = $_POST['request'];
    $jumlah     = $_POST['jumlah'];

    $id_user = $_SESSION['id_users'];

    // Ambil data user yang login
    $getUser = mysqli_query($conn,
        "SELECT full_name, email, address
         FROM users
         WHERE id_users = '$id_user'"
    );

    $user = mysqli_fetch_assoc($getUser);

    $nama   = $user['full_name'];
    $email  = $user['email'];
    $alamat = $user['address'];

    // Simpan pesanan
    $query = mysqli_query($conn,
    "INSERT INTO frm_accessories
    (
        product_type,
        deadline,
        size,
        yarn_type,
        product_color,
        special_request,
        quantity,
        id_users
    )
    VALUES
    (
        '$jenis',
        '$deadline',
        '$ukuran',
        '$benang',
        '$warna',
        '$request',
        '$jumlah',
        '$id_user'
    )");

    if($query){

        $nomor_wa = "62895328537054";

        $pesan = "Halo Admin,

Saya telah mengisi formulir custom accessories.

DATA PEMESAN
Nama : $nama
Email : $email
Alamat : $alamat

DETAIL PESANAN
Jenis Produk : $jenis
Deadline : $deadline
Ukuran : $ukuran cm
Jenis Benang : $benang
Warna : $warna
Request : $request
Jumlah : $jumlah";

        $pesan = urlencode($pesan);

        header("Location: https://wa.me/$nomor_wa?text=$pesan");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>


<head>
<title>Custom Accessories</title>
<link rel="stylesheet" href="css/frm_crochet.css">
</head>

<body>

    <div class="container">

    <h2>Custom Produk Accessories</h2><br>

    

    <form method="POST">
    

        <!-- <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required>
        <br><br>

        <label>Nomor Telepon:</label><br>
        <input type="text" name="telp" required>
        <br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat"></textarea> -->


    
        <label>Jenis Produk:</label>

                <div class="radio">
                <input type="radio" name="jenis" value="Cincin" required>
                Cincin <br>

                <input type="radio" name="jenis" value="Gelang Tangan">
                Gelang Tangan <br>

                <input type="radio" name="jenis" value="Gelang Kaki">
                Gelang Kaki
                </div>


                <label>Deadline:</label><br>
                <input type="date" name="deadline">
                <br><br>


                <label>Ukuran (cm):</label><br>
                <input type="text" name="ukuran">
                <br><br>


                <label>Jenis Benang:</label>

                    <div class="radio">

                    <input type="radio" name="benang" value="Benang Non Elastis">
                    Benang Non Elastis <br>

                    <input type="radio" name="benang" value="Benang Elastis">
                    Benang Elastis <br>

                    <input type="radio" name="benang" value="Tali Giok">
                    Tali Giok

    </div>

        <br>
        <label>Warna Produk:</label><br>
        <textarea name="warna"></textarea>
        <br><br>

        <label>Request Khusus:</label><br>
        <textarea name="request"></textarea>
        <br><br>


        <label>Jumlah Pesanan:</label><br>
        <input type="number" name="jumlah">
        <br><br>


    <button name="checkout">
    Checkout
    </button>

    <button type="reset" class="reset">
    Reset
    </button>


    </form>

    </div>


</body>

<?php
include 'footer.php';
?>