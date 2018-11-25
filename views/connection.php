<?php
include '../header.php';
include '../controllers/connectionController.php';
?>

<div class="container-fluid">
<h1>Connectez-vous</h1>
    <div class="row">
        <form id="formConnection" class="col l10 blue-grey darken-1" action="#" method="POST">
            <div class="input-field col l10 offset-l1">
                <input id="username" name="username" type="text">
                <label for="username">Nom d'utilisateur</label>
                <p id="error"><?= isset($errorList['username']) ? $errorList['username'] : '' ?></p>
            </div>
            <div class="input-field col l10 offset-l1">
                <input id="password" name="password" type="password">
                <label for="password">Mot de passe</label>
                <p id="error"><?= isset($errorList['password']) ? $errorList['password'] : '' ?></p>
            </div>
            <div class="col l2 offset-l8">
                <button id="connectionButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="connectionButton">CONNEXION</button>
            </div>
        </form>
    </div>
</div>
<p><?= $message ?></p>
</main>
<?php include '../footer.php'; ?>
</body>
</html>