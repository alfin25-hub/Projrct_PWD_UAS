<?php
session_start();
include 'header.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop & Soul</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>

    <section id="home">

        <div class="gambar">
            <img src="images/chibi/funny.png" width="275" height="350">
            <img src="images/chibi/sella.png" width="275" height="350">
        </div>

        <div class="foto">
            <div class="card">
                <h2 class="judul">Owner Loop & Soul</h2>
                <br>
                <img src="images/owner_photo/funny_rl.jpeg" width="450" height="333">
                <p class="text">
                    Hai, aku Funny, owner dari Loop & Soul! Awalnya, aku ikut workshop crochet
                    dan meronce gelang karena mau penuhi S-Core dan memang sudah lama ingin
                    belajar crochet. Lama-kelamaan aku dan Sella sering membeli beads dan
                    benang. Akhirnya aku membuat Loop & Soul sebagai tempat menuangkan
                    berbagai ide kreatifku.
                </p>
            </div>

            <div class="card">
                <h2 class="judul">Owner Loop & Soul</h2>
                <br>
                <img src="images/owner_photo/sella_rl.jpeg" width="450" height="333">
                <p class="text">
                    Hai, aku Sella, owner dari Loop & Soul! Awalnya aku tertarik karena melihat
                    rajutan yang lucu-lucu. Setelah mengikuti workshop dan belajar sendiri,
                    akhirnya rajut menjadi lebih dari sekadar hobi. Sekarang aku sangat senang
                    bisa menjalankan brand ini bersama.
                </p>
            </div>
        </div>

        <br>

        <h2 align="center">Poster</h2>

        <br>

        <div class="poster">
            <img src="images/poster/poster.jpeg" width="333" height="500">
            <img src="images/poster/poster_2.jpeg" width="333" height="500">
        </div>

    </section>

    <?php include 'footer.php'; ?>

</body>
</html>