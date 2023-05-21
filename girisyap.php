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
                Giriş Yap
                <form>
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium is-rounded" type="email" placeholder="hello@example.com" autocomplete="username" required />
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium is-rounded" type="password" placeholder="**********" autocomplete="current-password" required />
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
                            <a href="#">Create an Account</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
</body>

</html>