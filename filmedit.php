<?php
//mysql baglanti kodunu ekliyoruz
include("mysqlbaglan.php");

//sorguyu hazirliyoruz
$sql = "SELECT * FROM film WHERE id=" . $_GET['id'];

//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query($baglanti, $sql);

//eger cevap FALSE ise hata yazdiriyoruz.      
if (!$cevap) {
    echo '<br>Hata:' . mysqli_error($baglanti);
}


//veritabanından gelen cevabı alıyoruz.
$gelen = mysqli_fetch_array($cevap);
?>


<html>

<head>
    <title>Film Edit Form</title>
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
            background: url("https://hips.hearstapps.com/hmg-prod/images/best-netflix-animation-index-1585754615.jpg") no-repeat center;
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
    </style>
</head>

<body>
    <div class="main-block">
        <div class="left-part">
            <i class="fas fa-graduation-cap"></i>
            <h1>FILM EDITTTTTTTTTTTT</h1>
            <p>W3docs provides free learning materials for programming languages like HTML, CSS, Java Script, PHP etc.</p>
            <div class="btn-group">
                <a class="btn-item" href="https://www.w3docs.com/learn-html.html">Learn HTML</a>
                <a class="btn-item" href="https://www.w3docs.com/quiz/#">Select Quiz</a>
            </div>
        </div>

        <form action="filmkaydet.php?id=<?php echo $_GET['id'] ?>" method="POST">
            <div class="title">
                <i class="fas fa-pencil-alt"></i>
                <h2>Film Edit</h2>
            </div>
            <div class="info">
                <input class="fname" type="text" name="filmadi" placeholder="<?php echo $gelen['filmadi'] ?>">
                <input type="text" name="yonetmen" placeholder="<?php echo $gelen['yonetmen'] ?>">
                <input type="text" name="yil" placeholder="<?php echo $gelen['yil'] ?>">
                <input type="text" name="oyuncular" placeholder="<?php echo $gelen['oyuncular'] ?>">
                Filme kac puan veriyorsun:
                <select name="puan">
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