<!-- - Un footer (footer.php) :
Il contient un accès aux différentes pages. Il doit être inclus dans toutes les
pages du blog -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/81dc42ea59.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <footer>

        <div class="bloc_footer_nav">
            <ul class="list-nav">

                <?php
                if (empty($_SESSION)) {
                ?>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Connexion</a></li>

                <?php } else { ?>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="profil.php">Mon profil</a></li>
                    <li><a href="deconnect.php">Déconnexion</a></li>


                <?php  }

                ?>
                <?php if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] == 1337) { ?>

                    <!-- <li><a href="article.php">Article</a></li> -->
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="articles.php">Articles</a></li>

                <?php } ?>
                <?php if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] != 1) { ?>

                    <li><a href="creer-article.php">creer article</a></li>

                <?php } ?>


                <!-- <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li> -->
            </ul>
        </div>
        <div class="bloc_footer_media">
            <ul class="list-icons">
                <li><a href="https://www.facebook.com/LaPlateformeIO"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="https://github.com/salim-ouari/blog"><i class="fab fa-github-square"></i></a></li>
                <li><a href="https://twitter.com/LaPlateformeIO"><i class="fab fa-twitter-square"></i></a></li>
                <li><a href="https://www.instagram.com/laplateformeio/?hl=am-et"><i class="fab fa-instagram-square"></i></a></li>
                <li><a href="https://www.youtube.com/watch?v=a7_WFUlFS94&ab_channel=Fireship"><i class="fab fa-youtube-square"></i></a></li>
            </ul>
        </div>
    </footer>

</body>

</html>