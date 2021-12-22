<!-- - Un header (header.php) qui contient :

Un bouton de retour vers la page d’accueil, une liste déroulante contenant
les différentes catégories d’articles, si l’utilisateur n’est pas connecté : une
page d’inscription et une page de connexion, sinon une page permettant de
modifier son profil et une permettant de se déconnecter. Si l’utilisateur a
les droits de modérateur, il doit avoir accès à la page creer-article, si il est
administrateur, il peut également accéder à la page admin. Le header doit
être présent dans chacune des pages du blog. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>

<body>

</body>

</html>
<header>
    <div>
        <h1 id="title">BLOG</h1>
    </div>

    <nav>

        <ul>
            <li><a href="index.php">Accueil</a></li>

            <?php
            if (empty($_SESSION)) {
            ?>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>

            <?php } else { ?>


                <li><a href="profil.php">Mon profil</a></li>
                <li><a href="deconnect.php">Déconnexion</a></li>


            <?php  }

            ?>
            <?php if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] == 1337) { ?>

                <li><a href="article.php">Article</a></li>
                <li><a href="admin.php">Admin</a></li>
                <!-- <li><a href="profil.php">Profil</a></li> -->
                <li><a href="articles.php">Articles</a></li>

            <?php } ?>
            <?php if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] != 1) { ?>

                <li><a href="creer-article.php">creer article</a></li>

            <?php } ?>

        </ul>

    </nav>
</header>