<?php
require('connect.php');
session_start();

//On selectionne la totalité des infos des catégories afin des les afficher dans nos inputs
$requete_categories = mysqli_query($bdd, "SELECT * FROM categories");

//on récupere le résultat en gardant le nom de nos index
$result_categories = mysqli_fetch_all($requete_categories, MYSQLI_ASSOC);

//Puis on boucle de l'index du résultat de notre requête afin de créer le nombre d'input équivalent au nombre de catégorie
$i = 0;
while (isset($result_categories[$i])) {
?>
    <button type="submit" name="categories" value="<?= $result_categories[$i]['id'] ?>"><?= $result_categories[$i]['nom'] ?></button>
<?php
    $i++;
}


 //Si une catégorie est définie
 if (isset($_GET['categories'])){

    //Alors on récupere la valeur de l'url et on l'assimile à notre variable 'id de categorie'
    $id = $_GET['categories'];


// ***********requete pour compter les article pour préparer la pagination
$requete_count_art = mysqli_query($bdd, "SELECT COUNT(*) AS nbre_art FROM articles WHERE id_categorie = '$id'");
$result_count_art = mysqli_fetch_array($requete_count_art, MYSQLI_ASSOC);
var_dump($result_count_art);
// **************************pagination***********************************
// ************************SI page définie************************
if (isset($_GET['page'])) {

    $page = $_GET['page'];
}  // ****************SINON SI 1er fois qu'on charge la page - on affiche pr la 1er fois**************
else {

    $page = 1;
}
$article_par_page = 5;
// **********fonction system pour arrondir au chiffre entier**********************
$nbre_page = ceil($result_count_art[0]["nbre_art"] / $article_par_page);
$calc_art_page = ($page - 1) * $article_par_page;

// **********requete pr trier les articles*******************************
$requete_tri_art = mysqli_query($bdd, "SELECT * FROM articles ORDER BY date  DESC LIMIT $calc_art_page , $article_par_page");
$result_tri_art = mysqli_fetch_all($requete_tri_art, MYSQLI_ASSOC);
// var_dump($result_tri_art);

if (count($result_tri_art) == 0) {
    header("location: articles.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>

    <!-- <form action="get">
        <input type="submit" name="all" value="Tout"></input>
        <input type="submit" name="cat" value="Cinéma"></input>
        <input type="submit" name="cat" value="Series"></input>
        <input type="submit" name="cat" value="Animes"></input>


    </form> -->
    <input type='hidden' name='page' value='1'>

    <?php include 'header.php'; ?>

    <main style="border:2px solid pink; padding: 30px; height: 50vh; margin-bottom: 5px;">

    </main>

    <?php include 'footer.php'; ?>


</body>

</html>