<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    //mysql baglanti kodunu ekliyoruz 
    include("mysqlbaglan.php");

    //degiskenleri formdan aliyoruz
    $kullaniciadi = $_POST['kullaniciadi'];
    $sifre = $_POST['sifre'];


    echo "Kullanıcı Adı :$kullaniciadi</br>";
    echo "Şifre :$sifre</br>";

    //sorguyu hazirliyoruz
    $sql = "INSERT INTO kullanici " .
        "(kullaniciadi,sifre) " .
        "VALUES ('$kullaniciadi','$sifre')";

    echo $sql;
    echo "<br/>";
    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti, $sql);

    //eger cevap FALSE ise hata yazdiriyoruz.      
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    } else {
        echo "Veritabanina eklendi, Kayıtları görmek için";
        echo " <a href='listele.php'> Tiklayiniz</a>\n";
    }

    //veritabani baglantisini kapatiyoruz.
    mysqli_close($baglanti);
    ?>
</body>

</html>