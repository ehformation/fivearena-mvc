
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Five Arena - <?php echo $title ?></title>
    <link rel="shortcut icon" href="<?= URL_ASSETS; ?>images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL_ASSETS; ?>css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= URL_ASSETS; ?>css/style.css">
    <script src="https://kit.fontawesome.com/81e489c8c5.js" crossorigin="anonymous"></script>
</head>

<body>
    <header id="header" class="bg-image pt-40 pb-40">
        <div class="container mb-50">
            <div class="row ai-center">
                <div id="logo" class="cadre">
                    <img src="<?=URL_ASSETS;?>images/logo-fa.png" alt="Logo five Arena">
                </div>
                <nav id="nav" class="cadre">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?p=nos-terrains">Nos terrains</a></li>
                        <li><a href="index.php?p=contact">Contact</a></li>
                    </ul>
                </nav>
                <div id="sign">
                <?php if(!isLoggedIn()) : ?>
                        <a class="btn btn-blue" href="?p=connexion">Connexion</a>
                        <a class="btn btn-yellow" href="?p=inscription">Inscription</a>
                    <?php else : ?>
                        <a class="btn btn-blue" href="?p=account">Compte</a>
                        <a class="btn btn-red" href="?p=deconnexion">Deconnexion</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <footer id="footer" class="bg-blue pt-40 pb-40 white">
        <div class="container">
            <div class="row jc-between">
                <div class="col-4">
                    <!-- logo -->
                    <img src="<?=URL_ASSETS;?>images/logo-fg-blanc.png" alt="Logo five Arena" class="mb-30">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, et!</p>
                </div>
                <div class="col-3">
                    <!-- lien utiles -->
                    <h3 class="mb-30">Liens utilies</h3>
                    <ul>
                        <li><a href="index.php?p=nos-terrains">Nos terrains</a></li>
                        <li><a href="index.php?p=contact">Contact</a></li>
                        <li><a href="">Mentions légales</a></li>
                        <li><a href="">CGU / CGV</a></li>
                    </ul>
                </div>
                <div class="col-4">
                    <!-- reseaux sociaux  -->
                    <h3 class="mb-30">Suivez nous</h3>
                    <ul id="social" class="row">
                        <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-tiktok"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?= URL_ASSETS;?>js/main.js"></script>
</body>

</html>