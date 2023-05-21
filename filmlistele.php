<html>

<head>
    <meta charset="utf-8">
    <title>Filmleri Listele</title>
</head>

<body>
    <?php
    //mysql baglanti kodunu ekliyoruz
    include("mysqlbaglan.php");

    //sorguyu hazirliyoruz
    $sql = "SELECT * FROM film";

    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti, $sql);

    //eger cevap FALSE ise hata yazdiriyoruz.      
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    }

    //sorgudan gelen tüm kayitlari tablo içinde yazdiriyoruz.
    //önce tablo başlıkları oluşturalım
    echo "<table border=1>";
    echo "<tr><th>Film Adı</th><th>Yonetmen</th><th>Yılı</th><th>Oyuncular</th><th>Puan</th><th>Edit</th></tr>";

    //veritabanından gelen cevabı satır satır alıyoruz.
    while ($gelen = mysqli_fetch_array($cevap)) {
        // veritabanından gelen değerlerle tablo satırları oluşturalım
        echo "<tr><td>" . $gelen['filmadi'] . "</td>";
        echo "<td>" . $gelen['yonetmen'] . "</td>";
        echo "<td>" . $gelen['yil'] . "</td>";
        echo "<td>" . $gelen['oyuncular'] . "</td>";
        echo "<td>" . $gelen['puan'] . "</td>";
        echo "<td><a href='filmedit.php?id=";
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