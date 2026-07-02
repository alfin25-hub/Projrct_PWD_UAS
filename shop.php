<?php
include 'koneksi.php';


$query = mysqli_query($conn, "
    SELECT *
    FROM product
    ORDER BY category, name, description
");

$produk = [];

while($row = mysqli_fetch_assoc($query)){
    $produk[$row['category']][] = $row;
}
?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shop</title>
<link rel="stylesheet" href="css/shop.css">
</head>

<body>

<?php include 'header.php'; ?>

<section class="shop-container">

    <div id="filter">
        <select onchange="lompatKategori(this.value)">
            <option value="">Semua Kategori</option>

            <?php foreach($produk as $kategori => $item){ ?>
                <option value="<?= $kategori ?>">
                    <?= $kategori ?>
                </option>
            <?php } ?>

        </select>
    </div>

<?php foreach($produk as $kategori => $items){ ?>

<section id="<?= strtolower(str_replace(' ','-',$kategori)) ?>">

    <h1 class="shop-title"><br><br>
        <?= $kategori ?>
    </h1>

    <div class="grid">

        <?php foreach($items as $row){ ?>

        <div class="card">

            <img
                src="images/<?= $row['photo']; ?>"
                alt="<?= $row['name']; ?>"
            >

            <h3><?= $row['name']; ?></h3>

            <p class="harga">
                Rp <?= number_format($row['price'],0,',','.'); ?>
            </p>

            <?php if(!empty($row['description'])){ ?>
                <p class="description"><?= nl2br($row['description']); ?></p>
            <?php } ?>

            <button
    type="button"
    data-id="<?= $row['id']; ?>"
    onclick="openPopup(this)">
    Pesan
</button>

        </div>

        <?php } ?>

    </div>

</section>

<?php } ?>

</section>

<!-- POPUP -->

<div id="popup" class="popup">

    <div class="popup-content">

        <div class="popup-header">
            <span class="back" onclick="closePopup()">←</span>
            <span>Checkout</span>
        </div>

        <div class="product">

            <img id="img">

            <div class="product-info">
                <h4 id="namaProduk"></h4>
                <p id="hargaProduk"></p>
            </div>

            <div class="qty">
                <button onclick="kurang()">-</button>
                <span id="jumlah">1</span>
                <button onclick="tambah()">+</button>
            </div>

        </div>

        <div class="form">

            <input class="form"
                type="text"
                id="nama"
                placeholder="Nama">

            <input class="form"
                type="text"
                id="telp"
                placeholder="Nomor Telepon">

            <textarea class="form"
                id="alamat"
                placeholder="Alamat"></textarea>

        </div>

        <div class="popup-footer">

            <span>
                Total:
                <b id="total"></b>
            </span>

            <button
                class="checkout-btn"
                onclick="checkout()">
                Checkout
            </button>

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>

<script>

function lompatKategori(kategori){

    if(kategori==""){
        window.scrollTo({
            top:0,
            behavior:"smooth"
        });
        return;
    }

    let id = kategori
        .toLowerCase()
        .replaceAll(" ","-");

    document
        .getElementById(id)
        .scrollIntoView({
            behavior:"smooth"
        });
}

let harga = 0;
let jumlah = 1;
let product_id = 0;

function formatRupiah(angka){
    return "Rp " +
    angka.toString().replace(
        /\B(?=(\d{3})+(?!\d))/g,
        "."
    );
}

function openPopup(btn){

    product_id = btn.dataset.id;

    console.log("Product ID:", product_id);

    let card = btn.closest(".card");

    let img = card.querySelector("img").src;

    let nama = card.querySelector("h3").innerText;

    let textHarga = card.querySelector(".harga").innerText;

    let price = parseInt(
        textHarga.replace(/[^0-9]/g,"")
    );

    harga = price;
    jumlah = 1;

    document
        .getElementById("popup")
        .classList.add("show");

    document
        .getElementById("img")
        .src = img;

    document
        .getElementById("namaProduk")
        .innerText = nama;

    document
        .getElementById("hargaProduk")
        .innerText = formatRupiah(price);

    document
        .getElementById("jumlah")
        .innerText = jumlah;

    updateTotal();
}
function closePopup(){
    document
        .getElementById("popup")
        .classList.remove("show");
}

function tambah(){
    jumlah++;
    document.getElementById("jumlah").innerText = jumlah;
    updateTotal();
}

function kurang(){

    if(jumlah > 1){

        jumlah--;

        document.getElementById("jumlah")
        .innerText = jumlah;

        updateTotal();
    }
}

function updateTotal(){

    document.getElementById("total")
    .innerText =
    formatRupiah(harga * jumlah);
}

function checkout(){

    let nama = document.getElementById("nama").value;
    let telp = document.getElementById("telp").value;
    let alamat = document.getElementById("alamat").value;

    if(nama=="" || telp=="" || alamat==""){
        alert("Harap isi semua data!");
        return;
    }

    let produk = document.getElementById("namaProduk").innerText;
    let qty = jumlah;
    let price = harga;
    let subtotal = harga * jumlah;

    fetch("proses_checkout.php",{
        method:"POST",
        headers:{
            "Content-Type":"application/x-www-form-urlencoded"
        },
        body:new URLSearchParams({
            product_id: product_id,
            product_name: produk,
            full_name: nama,
            phone: telp,
            address: alamat,
            qty: qty,
            price: price,
            subtotal: subtotal
        })
    })

    .then(res=>res.text())

    .then(data=>{

        data = data.trim();

        // BELUM LOGIN
        if(data=="login"){

            alert("😊Silakan login terlebih dahulu!😊");
            window.location.href="login.php";
            return;
        }

        // BERHASIL
        if(data=="success"){

            let nomorWA="6283153437434";

            let pesan=`Halo, saya ingin memesan:

Produk : ${produk}
Jumlah : ${qty}
Total : ${formatRupiah(subtotal)}

Nama : ${nama}
No HP : ${telp}
Alamat : ${alamat}`;

            window.open(
                `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`,
                "_blank"
            );

            closePopup();

        }else{

            alert("Checkout gagal!");

        }

    })

    .catch(error=>{

        alert("Terjadi kesalahan!");

        console.log(error);

    });

}

</script>

</body>
