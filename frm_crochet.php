<?php
include 'header.php';
include 'koneksi.php';

// Cek login
if(!isset($_SESSION['id_users'])){
    echo "
    <script>
        alert('😊Silakan login terlebih dahulu!😊');
        window.location.href='login.php';
    </script>";
    exit();
}

$id_user = $_SESSION['id_users'];

// Ambil data user yang login
$getUser = mysqli_query($conn,
"SELECT full_name, phone_number, address, email
FROM users
WHERE id_users = '$id_user'");

$user = mysqli_fetch_assoc($getUser);

if(isset($_POST['checkout'])){

    $nama   = $user['full_name'];
    $telp   = $user['phone_number'];
    $alamat = $user['address'];

    $jenis      = $_POST['jenis'];
    $deadline   = $_POST['deadline'];
    $ukuran     = $_POST['ukuran'];
    $warna      = $_POST['warna'];
    $budget     = $_POST['budget'];
    $request    = $_POST['request'];
    $jumlah     = $_POST['jumlah'];

    $query = mysqli_query($conn,
    "INSERT INTO frm_crochet
    (
        
        product_type,
        deadline,
        size,
        color,
        budget,
        special_request,
        quantity,
        id_users
    )
    VALUES
    (
        
        '$jenis',
        '$deadline',
        '$ukuran',
        '$warna',
        '$budget',
        '$request',
        '$jumlah',
        '$id_user'
    )");

    if($query){

        $nomor_wa = "6285750064389";

        $pesan = "Halo Admin,

Saya telah mengisi formulir custom crochet.

DATA PEMESAN
Nama : $nama
Telepon : $telp
Alamat : $alamat

DETAIL PESANAN
Jenis Produk : $jenis
Deadline : $deadline
Ukuran : $ukuran cm
Warna : $warna
Budget : $budget
Request : $request
Jumlah : $jumlah";

        $pesan = urlencode($pesan);

        header("Location: https://wa.me/$nomor_wa?text=$pesan");
        exit();
    }
}
?>

<link rel="stylesheet" href="css/frm_crochet.css">

<head>

<title>Custom Crochet</title>


</head>

<body>


    <div class="container">

    <h2>Custom Produk Crochet</h2><br>


<form method="POST">

<h3>Jenis Produk</h3>

        <label>
        <input type="radio" name="jenis" value="Amigurumi">
        Amigurumi
        </label>

        <label>
        <input type="radio" name="jenis" value="Hair Clip">
        Hair Clip
        </label>

        <br><br>
        <h3>Detail Custom</h3>

        <br>
        <label>Deadline</label><br>
        <input type="date" name="deadline" required>


        <br>

        <label>Ukuran (cm)</label><br>
        <input type="text" name="ukuran">


        <br>

        <label>Warna Produk</label><br>
        <textarea name="warna"></textarea>



        <br>

        <label>Budget</label><br>
        <input type="text" name="budget">


        <br>

        <label>Request Khusus</label><br>
        <textarea name="request"></textarea>


        <br>
        <label>Jumlah Pesanan</label><br>
        <input type="number" name="jumlah">


<br><br>
<button name="checkout">
🛒Checkout
</button>

<button type="reset" class="reset">
❌Reset
</button>

</form>

</div>

</body>

<?php
include 'footer.php';
?>