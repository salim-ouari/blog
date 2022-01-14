<!-- - Une page permettant de modifier son profil (profil.php) :

Cette page possède un formulaire permettant à l’utilisateur de modifier
l’ensemble de ses informations. -->


<?php
session_start();
$error = "";

require('connect.php');

//si jappuie sur le bouton modif => je rentre dans la condition
if (isset($_POST['profil'])) {
    // definitions des variables 

    $id = $_SESSION['user']['id'];
    $newlogin = htmlspecialchars($_POST['login']);
    $newemail = htmlspecialchars($_POST['email']);
    $newpassword = htmlspecialchars($_POST['password']);
    $newpassword_confirm = htmlspecialchars($_POST['password_confirm']);


    // condition champs vide
    if (empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {

        $error = "veuillez remplir ce champs";
    } else {
        // condition mdp pas identique
        if ($newpassword != $newpassword_confirm) {
            $error = "Les mots de passe ne sont pas identiques.";
        } else {
            // hashage du mot de passe pour la sécurité
            $hash = password_hash($newpassword, PASSWORD_DEFAULT);

            //requêtes sql pour update utilisateur
            $requete2 = "UPDATE utilisateurs SET login = '$newlogin', email = '$newemail', password = '$hash' WHERE id = $id";
            $modifprofil = mysqli_query($bdd, $requete2);

            // si requete est valide
            if ($modifprofil == true) {

                // je selectionne les news valeurs 
                $query = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id = $id");
                $resultat = mysqli_fetch_assoc($query);
                // je réecris les news valeurs dans session
                $_SESSION['user'] = $resultat;

                header('Location: index.php');
            }
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
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">


</head>

<body class="bodyprof">

    <?php include 'header.php'; ?>

    <main>

        <div class="box-p">

            <div class="profil">

                <h1 class="h1prof">Profil</h1>
                <h2 class="h2prof">Bienvenue sur ton profil <?php echo $_SESSION['user']['login']; ?> ! </h2>

                <form method="post" action="profil.php" class="form-prof" method="post">

                    <input type="text" name="login" value="<?php echo $_SESSION['user']['login']; ?>" placeholder='New Login : "Johny"' required><br>
                    <input type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" placeholder='New Email : "Depp@gmail.com"' required><br>
                    <input type="password" name="password" value="<?php echo $_SESSION['user']['password']; ?>" placeholder='New Mot de passe : *****' required><br>
                    <input type="password" name="password_confirm" placeholder='Confirmation : *****' required><br>

                    <div class="error">
                        <?php echo "<p>" . $error . '</p>'; ?>
                    </div>

                    <div id="buttonprof">
                        <input class="inputprof" name=profil type="submit" value="Modifier">
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