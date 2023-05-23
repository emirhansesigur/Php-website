<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    session_start();
    //mysql baglanti kodunu ekliyoruz 
    include("mysqlbaglan.php");


    //degiskenleri formdan aliyoruz
    $filmadi = $_POST['filmadi'];
    $yonetmen = $_POST['yonetmen'];
    $yil = $_POST['yil'];
    $oyuncular = $_POST['oyuncular'];
    $yorum = $_POST['yorum'];
    $puan = $_POST['puan'];
    $kullaniciid = $_SESSION["kullaniciid"]; //ONEMLI: hangi kullanicinin filmi kaydettigini belirlemek icin.
    
    // if () {
    //     echo "Hatalı yıl değeri!";
    //     header("location: filmkayitformu.php");
    //     exit();
    // }


    echo "Girdiginiz bilgiler:</br>";
    echo "Film Adi   :$filmadi </br>";
    echo "Yonetmen:$yonetmen</br>";
    echo "Yapim Yili :$yil</br>";
    echo "Oyuncular  :$oyuncular</br>";
    echo "PUAN da YAZDIRRRRR";

    //sorguyu hazirliyoruz
    $sql = "INSERT INTO film " .
        "(filmadi,kaydedenid,yonetmen,yil,oyuncular,yorum,puan) " .
        "VALUES ( '$filmadi',$kullaniciid,'$yonetmen', '$yil', '$oyuncular', '$yorum' ,'$puan')";

    echo $sql;
    echo "<br/>";
    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti, $sql);

    //eger cevap FALSE ise hata yazdiriyoruz.      
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    } else {
        echo "Veritabanina eklendi";
    }

    //veritabani baglantisini kapatiyoruz.
    mysqli_close($baglanti);

    ?>
</body>

</html>