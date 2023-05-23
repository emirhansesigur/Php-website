<?php

session_start();
// if (isset($_SESSION['kullaniciadi'])) {
//     echo "giris var";
// }

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Anasayfa</title>


    <style>
        body {
            background-image: url('./bg.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        ul {
            list-style: none;
            background-color: rgba(255, 255, 255, 0.7);
            /* Şeffaf beyaz arka plan */
            padding: 20px;
            border-radius: 10px;
            font-size: 30px;
            /* Yazı boyutu büyütüldü */
        }

        ul li {
            margin-bottom: 40px;
        }

        ul li a {
            text-decoration: none;
            color: #000;
        }

        ul li a:hover {
            font-weight: bold;
        }


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
            color: white;
            background-color: rgba(100, 50, 128, 0.5);

        }

        .navbar-right {
            margin-right: 35px;
        }

        .tanitim {
            font-size: 30px;
            margin-left: 50px;
            margin-right: 50px;
            color:wheat;
            text-align: center;
            background-color: rgba(0, 0, 128, 0.5);
        }
    </style>
</head>

<body>
    <?php

    if (isset($_SESSION['kullaniciadi'])) {
    ?>
        <nav class="navbar">
            <div class="navbar-right">
                <a class="navbar-link" href="index.php"><?php echo $_SESSION['kullaniciadi']; ?></a>
            </div>
            <div class="navbar-right">
                <a class="navbar-link" href="./cikisyap.php">ÇIKIŞ YAP</a>
            </div>
        </nav>
    <?php

    } else {
    ?>
        <nav class="navbar">
            <div class="navbar-left">
                <a class="navbar-link" href="index.php">Anasayfa</a>
            </div>

            <div class="navbar-right">
                <a class="navbar-link" href="girisyapsayfasi.php">Giris Yap</a>
                <a class="navbar-link" href="kullanicikayitformu.php">Kaydol</a>
            </div>
        </nav>
    <?php
    }
    ?>




    <!-- <h1> Seçenekler </h1>
    <ul>
        <li><a href="girisyapsayfasi.php">Giris Yap</a>
        <li><a href="kullanicikayitformu.php">Kayit Ol </a>
        <li><a href="filmkayitformu.php">Film Kaydet </a>
        <li><a href="filmlistele.php">Filmler Listele </a>
            <ul> -->
    <div class="container">
        <ul>
            <li><a href="girisyapsayfasi.php">Giriş Yap</a></li>
            <li><a href="kullanicikayitformu.php">Kayıt Ol</a></li>
            <li><a href="filmkayitformu.php">Film Kaydet</a></li>
            <li><a href="filmlistele.php">Filmler Listele</a></li>
        </ul>
    </div>
    <div class="tanitim">Ben Emirhan Sesigür.<br>  Sizler için izlediğiniz filmlerin takibini yapabileceğiniz bir site tasarladım. Sadece kaydolun :) <br>PHP ve MySQL veritabanı kullandım. <a href="https://github.com/emirhansesigur" target="_blank" style="color:white" >Github'dan</a> kaynak kodlara ulaşabilirsiniz... </div>

</body>

</html>