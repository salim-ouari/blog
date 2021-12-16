<?php
session_start();
$error = '';

// si le bouton "connexion" est appuyé
if (isset($_POST['connexion'])) {

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($login != NULL && $password != NULL) {
        // connecte toi à la bdd
        require('connect.php');
        // requet pr rechercher si user existe
        $requete = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
        $resultat = mysqli_fetch_assoc($requete);

        $hash = $resultat['password'];

        if (password_verify($password, $hash)) {

            $_SESSION['user'] = $resultat;
            // header('location: profil.php');
            echo "bravo êtes connectés";

        } else {
      
            $error = "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
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
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <h1 id="ac">CONNEXION</h1>

    <main>
        <div id="myid">
            <form class="form" action="connexion.php" method="post">
                <table>
                    <tr>

                        <td>Login</td>
                        <td><input type="text" name="login" placeholder="Ex : deggg@laplate.io" required></td>
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
            <p class="error">
                <?php echo $error;   ?></p>
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
    <!-- <?php include 'footer.php'; ?> -->
</body>

</html>