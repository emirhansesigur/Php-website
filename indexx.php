<?php

session_start(); 
// ob_start();
echo "kullanici: session" . isset($_SESSION['kullanicadi']);
if(isset($_SESSION['kullaniciadi'])){
    echo "giris var";
}

?>

<html>

<body>
    <h1> Seçenekler </h1>
    <ul>
        <li><a href="girisyapsayfasi.php">Giris Yap</a>
        <li><a href="kullanicikayitformu.php">Kayit Ol </a>
        <li><a href="filmkayitformu.php">Film Kaydet </a>
        <li><a href="filmlistele.php">Filmler Listele </a>
            <ul>
</body>

</html>