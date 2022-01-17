<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Article edit</title>
</head>

<body>

    <?php
    session_start();
    require('header.php') ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin.php" target="_blank">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="editarticle.php" target="_blank">Article <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categorie.php" target="_blank">Categorie</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php require_once 'artpro.php'; ?>

    <?php

    if (isset($_SESSION['message'])) : ?>

        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>

        </div>

    <?php endif ?>

    <div class="container-fluid">
        <?php $mysqli = new mysqli('localhost', 'salim-ouari3', 'Zidane07@', 'salim-ouari_blog') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM articles") or die(mysqli_error($mysqli));
        //pre_r($result);
        ?>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Article</th>
                        <th>id_utilisateur</th>
                        <th>id_categorie</th>
                        <th>date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                <?php

                while ($row = $result->fetch_assoc()) : ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['article']; ?></td>
                        <td><?php echo $row['id_utilisateur']; ?></td>
                        <td><?php echo $row['id_categorie']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <a href="editarticle.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Modifier</a>
                            <a href="editarticle.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a>

                        </td>
                    </tr>


                <?php endwhile; ?>

            </table>

        </div>

        <?php

        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo '<pre>';
        }
        ?>
        <div class="row justify-content-center">
            <form action="artpro.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <textarea name="article" rows="5" cols="33"><?php echo $article ?></textarea>
                </div>
                <div class="form-group">
                    <label>ID utilisateur</label>
                    <input type="text" name="id_utilisateur" class="form-control" value="<?php echo $id_utilisateur; ?>" placeholder="Entrez votre ID">
                </div>
                <div class="form-group">
                    <label>Categorie</label>
                    <input type="text" name="id_categorie" value="<?php echo $id_categorie; ?>" class="form-control" placeholder="Entrez votre Catégorie">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" value="<?php echo $date; ?>" class="form-control" placeholder="Entrez la date">
                </div>
                <div class="form-group">
                    <?php
                    if ($update == true) :
                    ?>
                        <button type="submit" class="btn btn-info" name="update">Update</button>
                    <?php else : ?>

                    <?php endif; ?>
                </div>
        </div>
        </form>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>