<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Crud</title>
</head>
<body>

    <?php require_once 'process.php';?>
    <div class="container">
    <div class="row justify-content-center ">
    <?php $mysqli = new mysqli('localhost', 'root', '', 'blog') or die(mysqli_error($mysqli)); 
    $result = $mysqli->query("SELECT * FROM utilisateurs") or die(mysqli_error($mysqli));
    //pre_r($result);
    ?>

    <div class="row justify-content-center">
        <table class="table">
    <thead>
            <tr>
                <th>id</th>
                <th>Login</th>
                <th>Password</th>
                <th>Email</th>
                <th>id_droits</th>
                <th colspan="2">Action</th>
            </tr>
    </thead>
    <?php 

    while ($row = $result->fetch_assoc()):?>

    <tr>
        <td><?php echo $row['id'] ;?></td>
        <td><?php echo $row['login'] ;?></td>
        <td><?php echo $row['password'] ;?></td>
        <td><?php echo $row['email'] ;?></td>
        <td><?php echo $row['id_droits'] ;?></td>
        <td></td>
    </tr>

    <?php  endwhile; ?>

    </table>

    </div>

    <?php

        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '<pre>';
        }
    ?>    
    
        <form action="process.php" method="POST">
        <div class="form-group">
        <label>login</label>  
        <input type="text" name="login" class="form-control" placeholder="Entrez votre login">
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Entrez votre email">
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
        <label>Droit</label>
        <input type="text" name="id_droits" class="form-control">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary" name="save">Save</button>
        </div> 
        </form>
     </div>   
     </div>
</body>
</html>
