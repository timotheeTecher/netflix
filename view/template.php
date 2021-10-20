<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/style.css">
        <title><?= $title ?> | Netflix</title>
    </head>
    <body>
        <header>
            <div class="brand"><img src="public/assets/images/logo.png" alt="Netflix"></div>
        </header>

        <?= $content ?>

        <footer>
            <div class="container">
                <p>Des questions ? Appelez le 0800 917 813</p>
                <a href="#">Conditions des cartes cadeaux</a>
                <a href="#">Conditions d'utilisation</a>
                <a href="#">Déclaration de confidentialité</a>
            </div>
        </footer>
    </body>
</html>