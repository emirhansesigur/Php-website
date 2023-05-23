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
    $yorum = $_POST['yorum'];
    $puan = $_POST['puan'];

    
    //guncellemek icin sorguyu ayarlıyoruz.
    $sql = "UPDATE film " .
        "SET filmadi='$filmadi',yonetmen='$yonetmen',yil='$yil',oyuncular='$oyuncular',yorum='$yorum',puan='$puan' " .
        "WHERE id=" . $_GET['id'];
    "WHERE memur_id=" . $_GET['id'];
    // $sql = "INSERT INTO memurlar " .
    //     "(ad,soyad,birim,maas) " .
    //     "VALUES ( '$ad','$soyad', '$birim', '$maas')";


    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti, $sql);

    //eger cevap FALSE ise hata yazdiriyoruz.      
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    } else {
        echo "Veritabanina eklendi, Kayıtları görmek için";
        // echo " <a href='listele.php'> Tiklayiniz</a>\n";
    }

    echo "<script> alert('Film basarili bir sekilde kaydedilmistir'); window.location.href='signup.php'; </script>";


    //veritabani baglantisini kapatiyoruz.
    mysqli_close($baglanti);
    ?>
</body>

</html>