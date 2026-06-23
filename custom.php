<?php
include 'koneksi.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Produk - Loop & Soul</title>

    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<?php 
include 'header.php'; 
?>

<section id="custom">

    <div class="custom-title">
        <h1>Produk Custom</h1>
    </div>

    <div class="produk">

        <!-- Accessories -->
        <div class="p1">

            
            <a href="frm_accessories.php">
                <img
                    src="images/custom/acc img.png"
                    alt="Accessories"
                    width="250"
                    height="250"
                >
            </a>

            <h3>Accessories</h3>

        </div>

        <!-- Crochet -->
        <div class="p2">

            <a href="frm_crochet.php">
                <img
                    src="images/custom/cro img.png"
                    alt="Crochet"
                    width="250"
                    height="250"
                >
            </a>

            <h3>Crochet</h3>


        </div>

    </div>

</section>

<?php 
include 'footer.php'; 
?>

</body>
