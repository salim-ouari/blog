<!-- - Une page d’accueil (index.php).

Cette page contient les 3 derniers articles. En bas de la page, il doit y avoir
un lien vers la page articles. -->

<?php
session_start();

include('connect.php');

$requete = mysqli_query($bdd, "SELECT * FROM articles ORDER BY 'date' ASC LIMIT 3 ");
$result = mysqli_fetch_all($requete, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="bodyindex">

    <?php include 'header.php'; ?>

    <main>

        <div class="logo">

            <div class="Netflix">
                <span id="span-net"></span>
                <span id="span-net"></span>
                <span id="span-net"></span>
            </div>

        </div>

        <h3 class="h3index">Our Blog</h3>
        </div>


        <div class="contenu_carou_auto">
            <div class="caroussel-image">

                <img src="https://www.presse-citron.net/app/uploads/2019/02/netflix-breaking-bad-1000x600.jpg" alt="BREAKING BAD">
                <img src="https://imgr.cineserie.com/2021/04/le-loup-de-wall-street-une-actrice-devoile-une-anecdote-sexuelle-folle-sur-le-film.jpg?imgeng=/f_jpg/cmpr_0/w_660/h_370/m_cropbox&ver=1" alt="LE LOUP DE WALL STREET">
                <img src="https://cdn.wallpapersafari.com/47/86/JAZBzK.jpg" alt="BREAKING BAD">
                <img src="https://steamuserimages-a.akamaihd.net/ugc/950711732305490191/4E8BF6A5DA6EAB40E5E1A6AC0B7B86C51937F3CC/?imw=1024&imh=576&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" alt="DEATHNOTE">
                <img src="https://c4.wallpaperflare.com/wallpaper/305/115/735/harry-potter-movies-daniel-radcliffe-emma-watson-wallpaper-preview.jpg" alt="HARRY POTTER">
                <img src="https://cdn.radiofrance.fr/s3/cruiser-production/2020/09/a7bd10b3-3d73-4788-a142-7d42e5c55d02/838_matthew-mcconaughey-in-interstellar-wide.jpg" alt="INTERSTELLAR">
                <img src="https://entournantlespages.files.wordpress.com/2020/09/strangerthings2.jpg" alt="STRANGER THINGS">
                <img src="https://static.lpnt.fr/images/2020/04/18/20259720lpw-20259783-article-jpg_7055451_1250x625.jpg" alt="VIKINGS">

            </div>
        </div>
        <h2 class="h2index">Découvrez vite <a class="a-index" href="articles.php"> les articles</a> de notre blog ! </h2>

        <section class="container">

            <?php foreach ($result as $key) {
            ?>

                <div class="box">

                    <div class="divimg"><img src="asset/butt.jpg" alt="image clap movies"></div>

                    <h3 class="h3ny">New Article</h3>
                    <div class="paratitre">

                        <p><?= substr($key['article'], 0, 200) ?></p>
                        <p><?= $key['date'] ?></p>
                        <p><?php echo '<a id ="lien-article" href="article.php?id=' . $key['id'] . '"">Lire article</a>'; ?></p>
                    </div>
                </div>

            <?php    } ?>
        </section>
        <?php include 'footer.php'; ?>
    </main>
</body>

</html>