<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giris Yap</title>
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

        form {
            width: 350px;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['kullaniciadi'])) {

    ?>
        <nav class="navbar">
            <div class="navbar-right">
                <a class="navbar-link" href="index.php"><?php echo $_SESSION['kullaniciadi']; ?></a>
            </div>
            <div class="navbar-right">
                <a class="navbar-link" href="cikisyap.php">ÇIKIŞ YAP</a>
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
                include("mysqlbaglan.php");
                // session_start();

                if ($_POST) {
                    $kullaniciadi = $_POST["kullaniciadi"];
                    // $kullaniciadi = $_POST["kullaniciadi"];
                    $sifre = $_POST["sifre"];

                    $uzunluk = strlen($sifre);
                    if ($uzunluk < 6 || $uzunluk > 16) {
                        echo "sifre degeri 6 ile 16 karakter arasında olmalıdir <br>";
                    } else if ($kullaniciadi != "" and $sifre != "") {
                        $sifre_hash = hash("sha256", $sifre); // sifreyi hash ledik.
                        $sql = "SELECT * FROM kullanici WHERE `kullaniciadi`='$kullaniciadi' AND `sifre`='$sifre_hash' LIMIT 1";
                        $q = mysqli_query($baglanti, $sql);
                        $num = mysqli_num_rows($q);

                        if ($num == 0) {
                            echo 'Böyle bir kullanıcı bulunamadı!</';
                        } else if ($num == 1) {
                            $user = mysqli_fetch_assoc($q);
                            echo "Giriş başarılı! Hoş geldiniz, Sayın " . $user["adsoyad"];
                            $_SESSION['kullaniciadi'] = $kullaniciadi;

                            $_SESSION['kullaniciid'] = $user["kullaniciid"];
                            echo "session: " . $_SESSION['kullaniciadi'] . "<br>";
                            header("refresh:1, url=index.php");
                            // echo "Profili görüntülemek için <a href='profil.php'>tıklayınız</a>";
                        }
                    } else {
                        echo 'kullanici adi ya da sifre değeri boş bırakılamaz.<br>';
                    }
                }
                mysqli_close($baglanti);
                ?>

                Giriş Yap
                <form method="POST">

                    <div class="field">
                        <div class="control">
                            <input class="input is-medium is-rounded" type="email" name="kullaniciadi" placeholder="hello@example.com" autocomplete="username" required />
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium is-rounded" type="password" name="sifre" placeholder="**********" autocomplete="current-password" />
                        </div>
                    </div>
                    <br />
                    <button class="button is-block is-fullwidth is-primary is-medium is-rounded" type="submit">



                        Login
                    </button>
                </form>
                <br>
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                            <a href="./kullanicikayitformu.php">Hesap Oluştur</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
</body>

</html>