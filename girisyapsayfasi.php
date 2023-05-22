<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giris Yap</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/neumorphic-login.css">
</head>

<body>
    <section class="hero is-fullheight">
        <div class="hero-body has-text-centered">
            <div class="login" style="margin: auto;">

                <?php
                include("mysqlbaglan.php");
                session_start();
                
                if ($_POST) {
                    $kullaniciadi = $_POST["kullaniciadi"];
                    $sifre = $_POST["sifre"];
                    if ($kullaniciadi != "" and $sifre != "") {
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
                            echo "session: " . $_SESSION['kullaniciadi'] . "<br>";
                            header("refresh:2, url=index.php");
                            // echo "Profili görüntülemek için <a href='profil.php'>tıklayınız</a>";
                        }
                    } else {
                        echo 'Bos deger girmeyiniz';
                    }
                }

                ?>

                Giriş Yap
                <form method="POST">

                    <!-- action="girisyap.php"  -->
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