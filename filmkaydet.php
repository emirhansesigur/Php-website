<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    //mysql baglanti kodunu ekliyoruz 
    include("mysqlbaglan.php");

    //degiskenleri formdan aliyoruz
    $filmadi = $_POST['filmadi'];
    $yonetmen = $_POST['yonetmen'];
    $yil = $_POST['yil'];
    $oyuncular = $_POST['oyuncular'];
    $puan = $_POST['puan'];

    echo "Girdiginiz bilgiler:</br>";
    echo "Film Adi   :$filmadi </br>";
    echo "Yonetmen:$yonetmen</br>";
    echo "Yapim Yili :$yil</br>";
    echo "Oyuncular  :$oyuncular</br>";
    echo "PUAN da YAZDIRRRRR";

    //sorguyu hazirliyoruz
    $sql = "INSERT INTO film " .
        "(filmadi,yonetmen,yil,oyuncular, puan) " .
        "VALUES ( '$filmadi','$yonetmen', '$yil', '$oyuncular', '$puan')";

    // $sql = "INSERT INTO memurlar " .
    //     "(ad,soyad,birim,maas) " .
    //     "VALUES ( '$ad','$soyad', '$birim', '$maas')";

    echo $sql;
    echo "<br/>";
    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti, $sql);

    //eger cevap FALSE ise hata yazdiriyoruz.      
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    } else {
        echo "Veritabanina eklendi, Kayıtları görmek için";
        // echo " <a href='listele.php'> Tiklayiniz</a>\n";
    }

    //veritabani baglantisini kapatiyoruz.
    mysqli_close($baglanti);
    ?>
</body>

</html>