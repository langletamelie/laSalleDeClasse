<?php
include '../header.php';
include '../controllers/formAddTeacherController.php';
?>
 
<!-- si les champs sont remplis et qu'il n'y a pas d'erreur dans le formulaire -->
<?php if (isset($_POST['submit']) && (count($formError) === 0)) { 
    // Si le professeur n'est pas dans la base de données: on l'ajoute et on affiche un message de bienvenue et le lien vers la connexion sur le site 
     if ($check == 0) { ?> 
        <p id="messageOk">Vous êtes inscrit! Veuillez vous connecter pour accéder au contenu du site</p>
        <p id="messageOk"><a href="connection.php" title="lien vers la page de connexion" alt="page de connexion"><button type="button">CONNEXION</button></a></p>
    <?php } 
    // Si le professeur est déjà enregistré dans la base de données ou , on lui affiche un message d'erreur et un lien vers la page d'inscription
     if ($check != 0) { ?>
        <p id="messageOk">Vous êtes déjà enregistré dans notre base de données</p>
        <p id="messageOk"><a href="formAddTeacher.php" title="lien vers le formulaire d'inscription" alt="ajout de patient"><button type="button">INSCRIPTION</button></a></p>
    <?php } ?>
<?php } else { ?>  
    <div class="container-fluid">
        <div class="row">
            <form id="formTeacher" class="col s10" action="#" method="POST">
                <div class="input-field col s10 offset-s2">
                    <input id="lastname" name="lastname" type="text" value="<?= isset($lastname) ? $lastname : '' ?>" />
                    <label for="lastname">Nom</label>
                    <p id="error"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <input id="firstname" name="firstname" type="text" value="<?= isset($firstname) ? $firstname : '' ?>" />
                    <label for="firstname">Prénom</label>
                    <p id="error"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <input id="city" type="text" name="city" value="<?= isset($city) ? $city : '' ?>" />
                    <label for="city">Ville</label>
                    <p id="error"><?= isset($formError['city']) ? $formError['city'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <input id="username" type="text" name="username" value="<?= isset($username) ? $username : '' ?>" />
                    <label for="username">Nom d'utilisateur</label>
                    <p id="error"><?= isset($formError['username']) ? $formError['username'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <input id="mail" type="email" name="mail" value="<?= isset($mail) ? $mail : '' ?>" />
                    <label for="mail">Email</label>
                    <p id="error"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <input id="password" type="password" name="password" value="<?= isset($password) ? $password : '' ?>" />
                    <label for="password">Mot de passe</label>
                    <p id="error"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <input id="passwordVerify" type="password" name="passwordVerify" value="<?= isset($passwordVerify) ? $passwordVerify : '' ?>" />
                    <label for="passwordVerify">Confirmer le mot de passe</label>
                    <p id="error"><?= isset($formError['passwordVerify']) ? $formError['passwordVerify'] : '' ?></p>
                </div>
                <div class="col s10 offset-s2">
                    <p>
                        <input type="checkbox" id="certifyTeacher" name="certifyTeacher" value="certifyTeacher" />
                        <label for="certifyTeacher">En cochant cette case vous certifiez être un professeur</label>
                    </p>
                    <p id="error"><?= isset($formError['certifyTeacher']) ? $formError['certifyTeacher'] : '' ?></p>
                </div>
                <div class="col s10 offset-s2">
                    <p>
                        <input type="checkbox" id="termsOfUse" name="termsOfUse" value="termsOfUse" />
                        <label for="termsOfUse">J'ai lu et accepté les conditions d'utilisation</label>
                    </p>
                    <p id="error"><?= isset($formError['termsOfUse']) ? $formError['termsOfUse'] : '' ?></p>
                </div>
                <div class="col s10 col l2 offset-l9">
                    <button id="submitButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="submit">INSCRIPTION</button>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
</main>
<?php include '../footer.php'; ?>
</body>
</html>