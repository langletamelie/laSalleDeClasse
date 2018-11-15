<?php
include '../header.php';
include '../controllers/connectionController.php';
?>

<div class="container-fluid">
    <div id="formConnection" class="row">
        <form class="col s10" action="#" method="POST">
            <div class="input-field col s10 offset-s2">
                <input id="username" name="username" type="text" class="validate">
                <label for="username">Nom d'utilisateur</label>
                <p id="error"><?= isset($errorList['username']) ? $errorList['username'] : '' ?></p>
            </div>
            <div class="input-field col s10 offset-s2">
                <input id="password" name="password" type="text" class="validate">
                <label for="password">Mot de passe</label>
                <p id="error"><?= isset($errorList['password']) ? $errorList['password'] : '' ?></p>
            </div>
            <div class="col s10 col l2 offset-l9">
                <button id="submitButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="submit">CONNEXION</button>
            </div>
        </form>
    </div>
</div>
<p><?= $message ?></p>
</main>
<?php include '../footer.php'; ?>
</body>
</html>