<?php
session_start();
//connexion à la base
require('connect.php');
//requette pour compter les articles
$sql_count_articles = mysqli_query($bdd, 'SELECT COUNT(*) AS liste FROM articles');
$count_articles = mysqli_fetch_all($sql_count_articles, MYSQLI_ASSOC);

// ********************************pagination*****************************************
$page = "";
if (isset($_GET['page'])) {
    $page = $_GET["page"];
}
if (empty($page)) {
    $page = 1;
}
$nbr_article_par_page = 5;
$nbr_page = ceil($count_articles[0]["liste"] / $nbr_article_par_page);
$debut = ($page - 1) * $nbr_article_par_page;


//requette pour afficher tous les articles
$sql_articles = mysqli_query($bdd, "SELECT * FROM articles ORDER BY date DESC LIMIT $debut , $nbr_article_par_page");
$articles = mysqli_fetch_all($sql_articles, MYSQLI_ASSOC);
if (count($articles) == 0) {
    header("location: articles.php");
}

if (isset($_GET['categorie'])) {
    $page_categorie = $_GET['categorie'];
}

//******************************requete pour afficher les categories**********************************
$sql = mysqli_query($bdd, "SELECT categories.* FROM categories ");
$result_cat = mysqli_fetch_all($sql, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <?php require('header.php') ?>
    <main id="main_article">
        <h2 class="h2tri">Triage des articles par catégories </h2>
        <section class="categorieHidden">

            <!-- Button -->


            <form action="" method="GET">

                <div class="wrap">

                    <?php foreach ($result_cat as $categorie) { ?>
                        <button class="btn-1" name="categorie" value="<?php echo $categorie['nom']; ?> "><?php echo $categorie['nom']; ?> </button>
                    <?php } ?>

                    <input type='hidden' name='page' value='1'>
                    <button type='submit' name="submit" class="btn-1"><a href="articles.php"></a>Tout</button>

            </form>

        </section>

        <?php
        //********************************tri par catégorie des articles***************************
        if (isset($_GET['categorie'])) {

            if (($_GET['categorie']) == $page_categorie) {

                $sql_categories = mysqli_query($bdd, "SELECT a.id, a.article,a.date,a.id_utilisateur,a.id_categorie,c.nom FROM articles AS a INNER JOIN categories AS c ON c.id = a.id_categorie 
                    WHERE c.nom = '$page_categorie'");

                $result = mysqli_fetch_all($sql_categories, MYSQLI_ASSOC);
            }

            //****************************affichage des articles par catégorie*******************

        ?><section class="container_articles"><?php
                                                if (isset($_GET['page']) && $_GET['page'] == 1) {

                                                    for ($i = 0; isset($result[$i]) && $i < 5; $i++) {
                                                ?>

                        <div class=" box">
                            <div class="divimg"><img src="asset//butt.jpg" alt="image clap movies"></div>
                            <div class="paratitre">
                                <h3 class="h3ny">New Article</h3>
                                <p><?= substr($result[$i]['article'], 0, 200) ?>...</p>
                                <p><?= $result[$i]['date'] ?></p>
                                <div><?php echo '<a class="a-art" href="article.php?id=' . $result[$i]['id'] . '">Lire article</a>'; ?></div>
                            </div>
                        </div>
                    <?php
                                                    }
                                                } else {

                                                    for ($i = 5; isset($result[$i]) && $i < 10; $i++) {
                    ?>

                        <div class=" box">
                            <div class="divimg"><img src="asset/butt.jpg" alt="image clap movies"></div>
                            <div class="paratitre">
                                <h3 class="h3ny">New Article</h3>
                                <p><?= substr($result[$i]['article'], 0, 200) ?></p>
                                <p><?= $result[$i]['date'] ?></p>
                                <div><?php echo '<a class="a-art" href="article.php?id=' . $result[$i]['id'] . '">Lire article</a>'; ?></div>
                            </div>
                        </div>

                <?php
                                                    }
                                                }  ?>
            </section><?php
                    } else {
                        ?>

            <section class="container_articles">
                <?php
                        // ******************************On boucle sur tous les articles*************************
                        foreach ($articles as $article) {
                ?>

                    <div class="box">
                        <div class="divimg"><img src="asset/butt.jpg" alt="image clap movies"></div>
                        <div class="paratitre">
                            <h3 class="h3ny">New Article</h3>
                            <p><?= substr($article['article'], 0, 200) ?></p>
                            <p><?= $article['date'] ?></p>
                            <div><?php echo '<a class="a-art" href="article.php?id=' . $article['id'] . '"">Lire article</a>'; ?></div>
                            <input type="hidden" value=<?php $article['id'] ?>>
                        </div>
                    </div> <?php
                        }
                    }

                            ?>

            </section>
            <div class="pagination">

                <?php
                //****************************savoir sur qu'elle page nous sommes*************************** 
                if (isset($_GET['categorie'])) {

                    //*******************requette pour compter les articles*********************************
                    $sql_count_articles_cat = mysqli_query($bdd, "SELECT COUNT(articles.id_categorie) AS liste_cat FROM articles INNER JOIN
                    categories ON categories.id = articles.id_categorie WHERE categories.nom = '$page_categorie'");
                    $count_articles_cat = mysqli_fetch_all($sql_count_articles_cat, MYSQLI_ASSOC);

                    $nbr_article_par_page_cat = 5;
                    $nbr_page_cat = ceil($count_articles_cat[0]["liste_cat"] / $nbr_article_par_page_cat);
                    $debut_cat = ($page - 1) * $nbr_article_par_page_cat;


                    //*******************requette pour afficher tous les articles****************************
                    $sql_articles_cat = mysqli_query($bdd, "SELECT * FROM articles INNER JOIN categories ON categories.id = articles.id_categorie
                    WHERE categories.nom = '$page_categorie' ORDER BY date DESC LIMIT $debut_cat");

                    $articles_cat = mysqli_fetch_all($sql_articles_cat, MYSQLI_ASSOC);


                    for ($i = 1; $i <= $nbr_page_cat; $i++) {
                        if ($page != $i)
                            echo "<a class='btn-1 a-page' href='?page=$i&categorie=$page_categorie'>$i</a>&nbsp";
                        else
                            echo "<a class='btn-1 a-page'>$i</a>&nbsp";
                    }
                } else {
                    for ($i = 1; $i <= $nbr_page; $i++) {
                        if ($page != $i)
                            echo "<a class='btn-1 a-page' href='?page=$i'>$i</a>&nbsp";
                        else
                            echo "<a class='btn-1 a-page'>$i</a>&nbsp";
                    }
                }

                ?>
            </div>
    </main>
    <?php  ?>
</body>

</html>