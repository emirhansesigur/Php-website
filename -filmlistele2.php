<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("location: indexx.php");
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

    <?php
    //mysql baglanti kodunu ekliyoruz
    include("mysqlbaglan.php");

    $kullaniciid = $_SESSION["kullaniciid"];

    // echo  "kullanici numarasi:  ". $_SESSION["kullaniciid"];


    //sorguyu hazirliyoruz
    $sql = "SELECT * FROM film WHERE `kaydedenid`='$kullaniciid'"; // burada kontrol


    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti, $sql);

    //eger cevap FALSE ise hata yazdiriyoruz.      
    // if (!$cevap) {
    //     echo '<br>Hata:' . mysqli_error($baglanti);
    // }

    //sorgudan gelen tüm kayitlari tablo içinde yazdiriyoruz.
    //önce tablo başlıkları oluşturalım
    // echo "<table border=1>";
    // echo "<tr><th>Film Adı</th><th>Yonetmen</th><th>Yılı</th><th>Oyuncular</th><th>Puan</th><th>Edit</th></tr>";

    // //veritabanından gelen cevabı satır satır alıyoruz.
    // while ($gelen = mysqli_fetch_array($cevap)) {
    //     // veritabanından gelen değerlerle tablo satırları oluşturalım
    //     echo "<tr><td>" . $gelen['filmadi'] . "</td>";
    //     echo "<td>" . $gelen['yonetmen'] . "</td>";
    //     echo "<td>" . $gelen['yil'] . "</td>";
    //     echo "<td>" . $gelen['oyuncular'] . "</td>";
    //     echo "<td>" . $gelen['puan'] . "</td>";
    //     echo "<td><a href='filmeditsayfasi.php?id=";
    //     echo $gelen['id'];
    //     echo "'>Edit</a></td></tr>";
    // }
    // // tablo kodunu bitirelim.
    // echo "</table>";
    ?>

    <?php
    while ($gelen = mysqli_fetch_array($cevap)) {
    ?>
        <link rel="stylesheet" type="text/css" href="./-css.css">
        <div class="main-box no-header clearfix">
            <div class="table-responsive">
                <table class="table user-list">
                    <link rel="stylesheet" type="text/css" href="./-css.css">
                    <div class="main-box no-header clearfix">
                        <div class="table-responsive">
                            <table class="table user-list">

                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#" class="user-link"><?php echo $gelen['filmadi'] ?></a>
                                        </td>

                                        <td>2013/08/12</td>

                                        <td class="text-center">
                                            <span class="label label-danger"><?php echo $gelen['yorum'] ?></span>
                                        </td>

                                        <td>
                                            <a href="#">marlon@brando.com</a>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                    </div>

                <?php
            }
            //veritabani baglantisini kapatiyoruz.
            mysqli_close($baglanti);
            // echo "Yeni kayıt eklemek için <a href='kaydet.html'> Tiklayiniz</a>\n";
                ?>