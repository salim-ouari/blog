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
            <?php if (isset($_SESSION['id_droits']) && $_SESSION['id_droits'] == 1337) { ?>

                <li><a href="article.php">Articles</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="articles.php"></a>Articles</li>

            <?php } ?>
            <?php if (isset($_SESSION['id_droits']) && $_SESSION['id_droits'] != 1) { ?>

                <li><a href="creer-article.php">creer article</a></li>

            <?php } ?>

        </ul>

    </nav>
</header>