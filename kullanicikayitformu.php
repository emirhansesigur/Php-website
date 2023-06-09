<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kullanıcı Kayıt</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/neumorphic-login.css">

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

    <!-- <nav class="navbar">
        <div class="navbar-left">
            <a class="navbar-link" href="index.php">Anasayfa</a>
        </div>
    
        <div class="navbar-right">
            <a class="navbar-link" href="girisyapsayfasi.php">Giris Yap</a>
            <a class="navbar-link" href="kullanicikayitformu.php">Kaydol</a>
        </div>
    </nav> -->

    <?php
    session_start();
    if (isset($_SESSION['kullaniciadi'])) {
    ?>
        <nav class="navbar">
        <div class="navbar-right">
                <a class="navbar-link" href="index.php"><?php echo $_SESSION['kullaniciadi']; ?></a>
            </div>
            <div class="navbar-right">
                <a class="navbar-link" href="./cikisyap.php">ÇIKIŞ YAP</a>
            </div>
        </nav>
    <?php

    } else {
    ?>
        <nav class="navbar">
            <div class="navbar-left">
                <a class="navbar-link" href="index.php">Anasayfa</a>
            </div>

            <div class="navbar-right">
                <a class="navbar-link" href="girisyapsayfasi.php">Giris Yap</a>
                <a class="navbar-link" href="kullanicikayitformu.php">Kaydol</a>
            </div>
        </nav>
    <?php
    }
    ?>

    <section class="hero is-fullheight">
        <div class="hero-body has-text-centered">
            <div class="login" style="margin: auto;">

                <?php
                //mysql baglanti kodunu ekliyoruz 
                include("mysqlbaglan.php");
                // session_start();
                if ($_POST) {
                    //degiskenleri formdan aliyoruz
                    $kullaniciadi = $_POST['kullaniciadi'];
                    $adsoyad = $_POST['adsoyad'];
                    $sifre = $_POST['sifre'];

                    $uzunluk = strlen($sifre);
                    if ($uzunluk < 6 || $uzunluk > 16) {
                        echo "sifre degeri 6 ile 16 karakter arasında olmalıdir <br>";
                    } else if ($kullaniciadi != "" and $sifre != "") {


                        $sifre_hash = hash("sha256", $sifre);

                        //sorguyu hazirliyoruz
                        $sql = "INSERT INTO kullanici " .
                            "(kullaniciadi,adsoyad,sifre) " .
                            "VALUES ('$kullaniciadi','$adsoyad','$sifre_hash')";

                        //sorguyu veritabanina gönderiyoruz.
                        $cevap = mysqli_query($baglanti, $sql);
                        
                        //eger cevap FALSE ise hata yazdiriyoruz.      
                        if (!$cevap) {
                            echo '<br>Hata: ' . mysqli_error($baglanti);
                        } else {
                            echo "KAYIT İSLEMİ BASARİLİ";
                        }
                    } else {
                        echo "boş değer girmeyiniz. ";
                    }
                }
                //veritabani baglantisini kapatiyoruz.
                mysqli_close($baglanti);
                ?>


                Kaydol
                <form method="POST">
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium is-rounded" type="email" placeholder="Eposta Adresi" autocomplete="username" name="kullaniciadi" required />
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium is-rounded" type="text" placeholder="Ad Soyad" autocomplete="current-password" name="adsoyad" required />
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium is-rounded" type="password" placeholder="Şifre" autocomplete="current-password" name="sifre" required />
                        </div>
                    </div>
                    <br />
                    <button class="button is-block is-fullwidth is-primary is-medium is-rounded" type="submit">
                        Kaydol
                    </button>
                </form>
                <br>
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                            <a href="./girisyapsayfasi.php">Giriş Yap</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
</body>

</html>