<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'wtp';

$baglanti = mysqli_connect($server, $user, $password, $database);

if (!$baglanti) {
    echo "MySQL sunucu ile baglanti kurulamadi! </br>";
    echo "HATA: " . mysqli_connect_error();
    exit;
}

// echo "MySQL sunucuya baglanti kuruldu.</br>";
?>
