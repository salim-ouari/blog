<!-- Une page contenant un article et ses commentaires (article.php) :
Cette page permet de "VOIR UN ARTICLE", l’ensemble des commentaires
associés et la possibilité "D'EN AJOUTER UN NOUVEAU". 
Il faut utiliser l’argument GET “id” afin de sélectionner l’article souhaité.
ex : https://localhost/blog/article.php/?id=1  -->

<?php
session_start();

require('connect.php');

// ********************on récupére les infos de articles avec $get id ****************************
$id = $_GET['id'];

//requête de récupération des informations d'affichage de l'article concerné,
$requete_art = mysqli_query($bdd, "SELECT article, DATE_FORMAT(date, '%d/%m/%Y') AS 'date', DATE_FORMAT(date, '%H:%i:%s') AS 'heure' FROM articles WHERE id = $id");
$result_art = mysqli_fetch_array($requete_art, MYSQLI_ASSOC);



//*****************requête de récupération des informations de l'user ayant posté cet article*********************
$requete_art_user = mysqli_query($bdd, "SELECT utilisateurs.id, utilisateurs.login FROM articles INNER JOIN utilisateurs ON utilisateurs.id = id_utilisateur WHERE articles.id = $id");
$result_art_user = mysqli_fetch_array($requete_art_user, MYSQLI_ASSOC);

//*****************requête de récupération des informations de la catégorie de l'article*****************************
$requete_art_cat = mysqli_query($bdd, "SELECT categories.id , categories.nom FROM categories INNER JOIN articles ON categories.id = articles.id_categorie WHERE articles.id = $id");
$result_art_cat = mysqli_fetch_array($requete_art_cat, MYSQLI_ASSOC);
// var_dump($result_art_user);

// ********************requete pour récupérer les commentaires liés à l'article**********************
$requetecom = mysqli_query($bdd, "SELECT * FROM commentaires INNER JOIN utilisateurs ON id_utilisateur= commentaires.id  WHERE id_article = '$id' ORDER BY 'date' DESC");
$result_com = mysqli_fetch_all($requetecom, MYSQLI_ASSOC);
// var_dump($result_com);


if (isset($_POST['submit'])) {

    $user = $_SESSION['user']['id'];
    $comment = $_POST['commentaire'];

    $requeteinsert = mysqli_query($bdd, "INSERT INTO commentaires(commentaire,id_article,id_utilisateur,`date`) VALUES
    ('$comment',$id, $user,NOW())");
    var_dump($requeteinsert);
    var_dump("INSERT INTO commentaires(commentaire,id_article,id_utilisateur,date) VALUES
('$comment',$id, $user,NOW()");

    if (isset($requeteinsert)) {
        $requetecom = mysqli_query($bdd, "SELECT utilisateurs.login, commentaires.commentaire, commentaires.date, commentaires.id_article
    FROM utilisateurs INNER JOIN commentaires WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY 'date' DESC");
        $result_com = mysqli_fetch_all($requetecom, MYSQLI_ASSOC);
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <main id="main_article">

        <div id="article">
            <img src="asset/clap.jpg" alt="clap-réalisateur">
            <span>
                <h1 id="h1_art">Article</h1>
                <p class="p_article">Posté par: <?= $result_art_user['login'] ?></p>
                <p class="p_article">Le: <?= $result_art['date'] ?> à <?= $result_art['heure'] ?> </p>
                <p class="p_article">Catégorie: <?= $result_art_cat['nom'] ?> </p>
                <p class="article"><?= $result_art['article'] ?></p>
            </span>
        </div>
        <table id="table_art">
            <?php
            foreach ($result_com as $com) :
                if ($com['id_article'] == $id) {
            ?>

                    <tr>
                        <td><span> Posté par:</span>
                            <h3><?= $com['login']; ?></h3>
                        </td>

                        <td><span>le</span>
                            <em><?= $com['date']; ?></em>
                        </td>

                        <td> <?= $com['commentaire']; ?></td>
                        <?php ?>
                    </tr>
            <?php }
            endforeach;
            ?>
        </table>
        <div class="form_com">
            <form class="com_art" action="" method="post">
                <label for="commentaire">Poster un commentaire sur l'article</label>
                <textarea name="commentaire" id="com" cols="30" rows="10" placeholder="écrivez votre commentaire"></textarea>
                <button type="submit" name="submit" id="comm">Envoyer</button>
            </form>
        </div>
    </main>

    <?php include 'footer.php'; ?>

</body>

</html>