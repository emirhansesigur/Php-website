<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("location: index.php");
    exit();
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Filmleri Listele</title>
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
        table {
        width: 100%;
        background-color: #f2f2f2;
        border-collapse: separate;
        border-spacing: 0;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #ccc;
    }

    tr:nth-child(even) {
        background-color: #e6e6e6;
    }

    tr:hover {
        background-color: #d9d9d9;
    }

    .long-text {
        max-height: 320px;
        overflow: auto;
    }

    a {
        text-decoration: none;
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

    <?php
    //mysql baglanti kodunu ekliyoruz
    include("mysqlbaglan.php");

    $kullaniciid = $_SESSION["kullaniciid"];


    //sorguyu hazirliyoruz
    $sql = "SELECT * FROM film WHERE `kaydedenid`='$kullaniciid'"; // burada kontrol


    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti, $sql);

    //eger cevap FALSE ise hata yazdiriyoruz.      
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    }

    //sorgudan gelen tüm kayitlari tablo içinde yazdiriyoruz.
    //önce tablo başlıkları oluşturalım
    echo "<table border=1>";
    echo "<tr><th>Film Adı</th><th>Yonetmen</th><th>Yılı</th><th>Oyuncular</th><th>Yorum</th><th>Puan</th><th>Edit</th></tr>";

    //veritabanından gelen cevabı satır satır alıyoruz.
    while ($gelen = mysqli_fetch_array($cevap)) {
        // veritabanından gelen değerlerle tablo satırları oluşturalım
        echo "<tr><td>" . $gelen['filmadi'] . "</td>";
        echo "<td>" . $gelen['yonetmen'] . "</td>";
        echo "<td>" . $gelen['yil'] . "</td>";
        echo "<td>" . $gelen['oyuncular'] . "</td>";
        echo "<td>" . $gelen['yorum'] . "</td>";
        echo "<td>" . $gelen['puan'] . "</td>";
        echo "<td><a href='filmeditsayfasi.php?id=";
        echo $gelen['id'];
        echo "'>Edit</a></td></tr>";
    }
    // tablo kodunu bitirelim.
    echo "</table>";

    //veritabani baglantisini kapatiyoruz.
    mysqli_close($baglanti);

    // echo "Yeni kayıt eklemek için <a href='kaydet.html'> Tiklayiniz</a>\n";
    ?>
</body>

</html>