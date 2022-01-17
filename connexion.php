<!-- - Une page contenant un formulaire de connexion (connexion.php) :
Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
informations, alors l’utilisateur devient connecté et une (ou plusieurs)
variables de session sont créées. -->

<?php

session_start();
$error = '';


if (isset($_POST['connexion'])) {

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);


    if (isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])) {


        require('connect.php');


        $requete = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");

        $resultat = mysqli_fetch_assoc($requete);

        if ($resultat) {

            if ((password_verify($password, $resultat['password'])) && ($login == $resultat['login'])) {

                $_SESSION['user'] = $resultat;

                header('location: profil.php');
            } else {

                $error = "Mot de passe ou Login incorrect !";
            }
        } else {

            $error = "Mot de passe ou Login incorrect !";
        }


        if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] == 1337) {


            header('Location: admin.php');
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <main>

        <div class="box-c">

            <div class="conni">

                <h1 class="h1conni">Connexion</h1>
                <h2 class="h2conni">Place à la connexion Dicaprio ! </h2>

                <form method="post" action="connexion.php" class="form-conni" method="post">

                    <input type="text" name="login" placeholder='Login : "Johny"' required><br>
                    <input type="password" name="password" placeholder='Mot de passe : *****' required><br>

                    <div class="error">
                        <?php echo "<p>" . $error . '</p>'; ?>
                    </div>

                    <div id="buttonconni">
                        <input class="inputconni" name="connexion" type="submit" value="Se connecter">
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