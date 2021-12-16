<?php

require('connect.php');
$message = '';

if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirm']))
{
    $login = htmlspecialchars($_POST['login']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['password_confirm']);

    $requete2 = mysqli_query($bdd, "SELECT * FROM `utilisateurs` WHERE login = '$login'");
    // recupérer la requete "est ce que j'ai un login déjà existant
    $resultat = mysqli_fetch_assoc($requete2);

    // si elle me renvoi rien "pas de login existant"
    if ($resultat == false) {
        if ($password == $confirm_password) {

            // hashage du mot de passe pour la sécurité
            $hash = password_hash($password, PASSWORD_DEFAULT);

            //  alors inscrit le dans ma base de donnée
            $requete = mysqli_query($bdd, "INSERT INTO `utilisateurs`(`login`, `password`, `email`, `id_droits`) VALUES ('$login', '$hash', '$email', 1)");
            header('Location: connexion.php');
        
        } else {
            $message = 'les mots de passe ne sont pas identiques';
        }
    } else {
        $message = 'compte déjà existant';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>
        <h1 id="ac">INSCRIPTION</h1>
        <div id="myid">
            <form class="form" action="inscription.php" method="post">
                <table>
                    
                    <tr>
                        <td>Login</td>
                        <td><input type="text" name="login" placeholder="Ex : John" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" placeholder="Ex john@gmx.fr : "></td>
                    </tr>
                    <tr>

                        <td>Mot de passe</td>
                        <td><input type="password" name="password" placeholder="Ex : *****" required></td>
                    </tr>
                    <tr>
                        <td>Confirmer mot de passe</td>
                        <td><input type="password" name="password_confirm" placeholder="Ex : *****"></td>
                    </tr>

                </table>
                <div id="but">
                    <button type="submit" name="Inscription">Inscription</button>

                    <?php
                    echo "<p class='error'>$message</p>";
                    ?>
                </div>
            </form>
        </div>
        <p class="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam mollitia consectetur maxime, tempore consequatur impedit.
            Voluptatem qui asperiores nobis quia mollitia distinctio inventore nam temporibus quis veniam ut, tenetur fugiat praesentium
            nesciunt nihil velit incidunt dolores. Odit ad corrupti pariatur debitis fugit. Animi, voluptatum explicabo? Illum iure tempora
            eveniet quas veritatis placeat sapiente, voluptate cumque consequuntur sed inventore, accusantium ex voluptatum. Adipisci laudantium
            quia labore nam magnam similique dolor blanditiis natus voluptates quam doloribus nostrum dolores reprehenderit, nemo veniam provident
            iste non libero? Vitae, quasi minus. Maxime natus laudantium, modi eum dicta pariatur recusandae porro. Exercitationem rerum corrupti harum
            quibusdam.
        </p>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>