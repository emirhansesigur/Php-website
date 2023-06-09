<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("location: girisyapsayfasi.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Film Kayit Formu</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
            color: #eee;
        }

        body {
            background-image: url('./bg.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        h1,
        h2 {
            text-transform: uppercase;
            font-weight: 400;
        }

        h2 {
            margin: 0 0 0 8px;
        }

        .main-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 25px;
            background: rgba(0, 0, 0, 0.5);
        }

        .left-part,
        form {
            padding: 25px;
        }

        .left-part {
            text-align: center;
        }

        .fa-graduation-cap {
            font-size: 72px;
        }

        form {
            background: rgba(0, 0, 0, 0.7);
        }

        .title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .info {
            display: flex;
            flex-direction: column;
        }

        input,
        select {
            padding: 5px;
            margin-bottom: 30px;
            background: transparent;
            border: none;
            border-bottom: 1px solid #eee;
        }

        input::placeholder {
            color: #eee;
        }

        option:focus {
            border: none;
        }

        option {
            background: black;
            border: none;
        }

        .checkbox input {
            margin: 0 10px 0 0;
            vertical-align: middle;
        }

        .checkbox a {
            color: #26a9e0;
        }

        .checkbox a:hover {
            color: #85d6de;
        }

        .btn-item,
        button {
            padding: 10px 5px;
            margin-top: 20px;
            border-radius: 5px;
            border: none;
            background: #26a9e0;
            text-decoration: none;
            font-size: 15px;
            font-weight: 400;
            color: #fff;
        }

        .btn-item {
            display: inline-block;
            margin: 20px 5px 0;
        }

        button {
            width: 100%;
        }

        button:hover,
        .btn-item:hover {
            background: #85d6de;
        }

        @media (min-width: 568px) {

            html,
            body {
                height: 100%;
            }

            .main-block {
                flex-direction: row;
                height: calc(100% - 50px);
            }

            .left-part,
            form {
                flex: 1;
                height: auto;
            }
        }

        .navbar {
            background-color: rgba(128, 128, 128, 0.5);
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .navbar-link {
            color: black;
            text-decoration: none;
            padding: 5px 10px;
            font-size: 24px;
        }

        .navbar-link:hover {
            /* background-color: darkgray; */
            background-color: rgba(128, 128, 128, 0.5);
        }

        .navbar-right {
            margin-right: 35px;
        }
    </style>
</head>

<body>
    <!-- <nav class="navbar">
        <div class="navbar-left">
            <a class="navbar-link" href="#">Anasayfa</a>
        </div>
        <div class="navbar-right">
            <a class="navbar-link" href="#">Giriş Yap</a>
        </div>
    </nav> -->

    <?php

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

    <div class="main-block">
        <div class="left-part">
            <i class="fas fa-graduation-cap"></i>
            <h1>FILM KAYDET</h1>
            <p >İzlediginiz filmi yorumunuz ve puanınızla birlikte kaydedin</p>
            <div class="btn-group">
                <a class="btn-item" href="index.php">Anasayfa</a>
            </div>
        </div>

        <form action="filmkaydet.php" method="POST">
            <div class="title">
                <i class="fas fa-pencil-alt"></i>
                <h2>Film Kaydet</h2>
            </div>
            <div class="info">
                <input class="fname" type="text" name="filmadi" placeholder="Film Adi" required>
                <input type="text" name="yonetmen" placeholder="Yonetmen" required>
                <input type="text" name="yil" placeholder="Yili" required>
                <input type="text" name="oyuncular" placeholder="Oyuncular" required>
                <input type="text" name="yorum" placeholder="Film Hakkındaki Yorumunuzu Giriniz" required>
                Filme kac puan veriyorsun:
                <select name="puan">
                    <!-- 1- 5 arası kontol et -->
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <!-- <div class="checkbox">
                <input type="checkbox" name="checkbox"><span>I agree to the <a href="https://www.w3docs.com/privacy-policy">Privacy Poalicy for W3Docs.</a></span>
            </div> -->
            <button type="submit" href="/">Kaydet</button>
        </form>
    </div>
</body>

</html>