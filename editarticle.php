<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Crud</title>
</head>

<body>
    
    

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

    <div class="container">
        <?php $mysqli = new mysqli('localhost', 'root', '', 'blog') or die(mysqli_error($mysqli));
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
                <div class="form-group">
                    <textarea name="message"  rows="5">
                    <?php echo $article?>
                    </textarea> 
                </div>
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
</body>

</html>