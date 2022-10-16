<?php 
require('actions/entities/loginAction.php');
?>

<!DOCTYPE html>
    <html lang="fr">
    <?php include 'pages/include/head.php'; ?>
    <body>
        <div class="login-page">
            <form class="form-login" method="POST">
                <h1>Muscle Builder</h1>
                <p>Console d'administration</p>
                <br><br>
                <div class="form-inputs">
                    <label for="userLogin" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="userLogin">
                    <label for="userPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="userPassword">
                </div>
                
                <?php if(isset($errorMsg)){ echo '<p class="text-danger">'.$errorMsg.'</p>'; } 
                ?>
                <br><br>
                <button type="submit" class="btn btn-primary" name="signup">Se connecter</button>
            </form>
        </div>
    </body>
</html>