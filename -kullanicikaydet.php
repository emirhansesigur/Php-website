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
    $adsoyad = $_POST['adsoyad'];
    $sifre = $_POST['sifre'];
    
    $sifre_hash = hash("sha256", $sifre);
    
    echo "Kullanıcı Adı :$kullaniciadi</br>";
    echo "Şifre :$sifre</br>";
    
    //sorguyu hazirliyoruz
    $sql = "INSERT INTO kullanici " .
    "(kullaniciadi,adsoyad,sifre) " .
    "VALUES ('$kullaniciadi','$adsoyad','$sifre_hash')";
    
    echo $sql;
    echo "<br/>";
    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti, $sql);

    //eger cevap FALSE ise hata yazdiriyoruz.      
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti) . "<br>";
    } else {
        echo "KAYIT BAŞARILI";
    }
    //veritabani baglantisini kapatiyoruz.
    mysqli_close($baglanti);
    ?>
</body>

</html>