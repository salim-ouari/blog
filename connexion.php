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

        if (isset($resultat['login']) && $resultat['login'] == 'admin') {

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

    <main style="border:2px solid pink; padding: 30px; height: 50vh; margin-bottom: 5px;">
        <h1 id="ac">CONNEXION</h1>

        <div id="myid">
            <form class="form" action="connexion.php" method="post">
                <table>
                    <tr>

                        <td>Login</td>
                        <td><input type="text" name="login" placeholder="Ex : John" required></td>
                    </tr>
                    <tr>

                        <td>Mot de passe</td>
                        <td><input type="password" name="password" placeholder="Ex : *****" required></td>
                    </tr>

                </table>
                <div id="but">
                    <button type="submit" name="connexion">Connexion</button>
                </div>
            </form>

            <?php
            echo "<br> <p class='msg'>" . $error . '</p> <br>';
            ?>

        </div>
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