<!-- - Une page contenant un formulaire d’inscription (inscription.php) :

Le formulaire doit contenir l’ensemble des champs présents dans la table
“utilisateurs” ainsi qu’une confirmation de mot de passe. Dès qu’un
utilisateur remplit ce formulaire, les données sont insérées dans la base de
données et l’utilisateur est dirigé vers la page de connexion. -->


<?php

require('connect.php');
$error = '';



if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
    $login = htmlspecialchars($_POST['login']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['password_confirm']);

    $requete2 = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
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
            $error = 'Les mots de passe ne sont pas identiques';
        }
    } else {
        $error = 'Compte déjà existant';
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

    <?php include 'header.php'; ?>

    <main>

        <div class="box-a">

            <div class="boxy">

                <h1 class="h1inscr">Inscription</h1>
                <h2 class="h2inscri">Je te laisse t'inscrire Al Pacino ! </h2>

                <form method="post" action="inscription.php" class="form-inscri" method="post">

                    <input type="text" name="login" placeholder='Login : "Johny"' required><br>
                    <input type="email" name="email" placeholder='Email : "Depp@gmail.com"' required><br>
                    <input type="password" name="password" placeholder='Password : *****' required><br>
                    <input type="password" name="password_confirm" placeholder='Confirmation : *****' required><br>

                    <div class="error">
                        <?php echo "<p>" . $error . '</p>'; ?>
                    </div>

                    <div id="buttoninscri">
                        <input class="inputinscr" type="submit" value="S'inscrire">
                    </div>

                </form>

            </div>

        </div>

    </main>


    <div>
        <?php include 'footer.php'; ?>
    </div>
</body>



</html>