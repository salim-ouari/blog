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
    <script src="https://kit.fontawesome.com/225d5fd287.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>

<body>

</body>

</html>
<header>
    <div>
        <h1 id="title"><span>B</span>LOG</h1>
    </div>

    <nav id="navhead">
        <a href="index.php">
            <i class="fa fa-home" aria-hidden="true"></i>
            Accueil
        </a>
        <?php

        if (empty($_SESSION)) {
        ?>

            <a href="inscription.php">
                <i class="fa fa-user-plus" aria-hidden="true"></i>Inscription</a>

            <a href="connexion.php">
                <i class="fa fa-user" aria-hidden="true"></i>Connexion</a>

        <?php } else { ?>

            <a href="profil.php">
                <i class="fa fa-user-circle" aria-hidden="true"></i>Profil</a>

            <a href="deconnect.php">
                <i class="fas fa-sign-out-alt" aria-hidden="true"></i>Deconnexion</a>

        <?php  }

        ?>
        <?php if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] == 1337) { ?>


            <!-- <a href="article.php">
                    <i class="fas fa" aria-hidden="true"></i>Article</a> -->

            <a href="admin.php">
                <i class="fa fa-user" aria-hidden="true"></i>Admin</a>

            <a href="articles.php">
                <i class="fas fa-book-open" aria-hidden="true"></i>Articles</a>

        <?php }
        if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] != 1) { ?>
            <a href="creer-article.php">
                <i class="fas fa-plus-circle" aria-hidden="true"></i>Ajouter Article</a>

        <?php }
        ?>
        <ul id="menucat">

            <li><i class="fa fa-book" aria-hidden="true"></i>Categories</li>

            <ul id="listcat">
            
                <li><a href="articles.php">Tous</a></li>

                <?php
                
                ?>
            </ul>

        </ul>
    </nav>
    </nav>
</header>