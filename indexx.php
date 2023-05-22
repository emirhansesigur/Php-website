<?php

session_start();
if (isset($_SESSION['kullaniciadi'])) {
    echo "giris var";
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Anasayfa</title>


    <style>
        .navbar {
            /* background-color: rgba(128, 128, 128, 0.5); */
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .navbar-link {
            color: black;
            /* text-decoration: none; */
            padding: 5px 10px;
            font-size: 24px;
        }

        .navbar-right {
            margin-right: 35px;
        }
    </style>
</head>

<body>

    <?php

    if (isset($_SESSION['kullaniciadi'])) {
    ?>
        <nav class="navbar">
            <div class="navbar-right">
                <a class="navbar-link" href="./cikisyap.php">ÇIKIŞ YAP</a>
            </div>
        </nav>
    <?php

    } else {
    ?>
        <nav class="navbar">
            <div class="navbar-left">
                <a class="navbar-link" href="indexx.php">Anasayfa</a>
            </div>

            <div class="navbar-right">
                <a class="navbar-link" href="girisyapsayfasi.php">Giris Yap</a>
                <a class="navbar-link" href="kullanicikayitformu.php">Kaydol</a>
            </div>
        </nav>
    <?php
    }
    ?>


    <h1> Seçenekler </h1>
    <ul>
        <li><a href="girisyapsayfasi.php">Giris Yap</a>
        <li><a href="kullanicikayitformu.php">Kayit Ol </a>
        <li><a href="filmkayitformu.php">Film Kaydet </a>
        <li><a href="filmlistele.php">Filmler Listele </a>
            <ul>
</body>

</html>