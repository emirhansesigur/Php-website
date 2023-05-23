
<?php

include("mysqlbaglan.php");

$kullaniciadi = $_POST["kullaniciadi"];
$sifre = $_POST["sifre"];


$sifre_hash = hash("sha256", $sifre); // sifreyi hash ledik.

$sql = "SELECT * FROM kullanici WHERE `kullaniciadi`='$kullaniciadi' AND `sifre`='$sifre_hash' LIMIT 1";

$q = mysqli_query($baglanti, $sql);
$num = mysqli_num_rows($q);

if ($num == 0) {
    echo "Böyle bir kullanıcı bulunamadı!T.C. Kimlik numaranız veya şifrenizi kontrol ediniz.";
    exit;
} else if ($num == 1) {
    $user = mysqli_fetch_assoc($q);
    echo "Giriş başarılı! Hoş geldiniz, Sayın " . $user["adsoyad"];
    echo "Profili görüntülemek için <a href='profil.php'>tıklayınız</a>";
    exit;
}
