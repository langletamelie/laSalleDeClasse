<?php
include '../header.php';
include '../controllers/profileTeacherController.php';
?>

<?php if (isset($_SESSION['isConnect'])) { ?>

    <div class="row">
        <div class="col s12 m4 l3">
            <div class="card" id="profilCard">
                <div class="card-image">
                    <img src="../assets/picturesProfil/<?= $teacherList->name?>.jpg" id="pictureProfil">
                </div>
                <div class="card-content">
                    <p><?= $_SESSION['username']?></p>
                </div>
            </div>
            <div class="card-panel teal blue-grey darken-1" id="favoritesActivities-show-hide">
                <p>MES ATELIERS PRÉFÉRÉS</p>
            </div>
            <div class="card-panel teal blue-grey darken-1" id="addHisActivities-show-hide">
                <p>MES ATELIERS PROPOSÉS</p>
            </div>
            <div class="card-panel teal blue-grey darken-1" id="modifyProfil-show-hide">
                <p>MODIFIER MON COMPTE</p>
            </div>
        </div>
        <div class="col s12 m8 l9">
            <div id="favoritesActivities"> 
            <?php foreach ($displayFavoritesActivities as $favoriteActivityDetail) { ?>
                <div class="card blue-grey darken-1 col s12 m6 l5 offset-l1">
                        <div class="card-content white-text">
                        <p>Nom de l'atelier : <?= $favoriteActivityDetail->name ?></p>
                        <p>Objectif de l'atelier : <?= $favoriteActivityDetail->object ?></p>
                        </div>
                        <div class="card-action">
                        <a href="displayActivity.php?id=<?= $activityDetail->id ?>">Voir l'activité</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div id="addHisActivities"> 
                   <?php foreach ($displayActivity as $activityDetail) { ?>
                        <div class="card blue-grey darken-1 col s12 m6 l5 offset-l1">
                        <div class="card-content white-text">
                        <p>Nom de l'activité : <?= $activityDetail->name ?></p>
                        <p>Objectif de l'activité : <?= $activityDetail->object ?></p>
                        </div>
                        <div class="card-action">
                            <a href="displayActivity.php?id=<?= $activityDetail->id ?>">Voir l'activité</a>
                            <a href="modifyActivity.php?id=<?= $activityDetail->id ?>">Modifier l'activité</a>
                            <button id="deleteActivity" class="btn waves-effect waves-light red accent-4 z-depth-4" type="submit" name="deleteActivity">SUPPRIMER</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div id="modifyProfil" class="blue-grey darken-1"> 
                <div>
                    <form id="choosePictureProfil" class="col s10" action="profileTeacher.php" method="POST">
                        <label class="col s10 offset-s2" for="selectPicture">Choissisez une photo de profil</label>
                        <div class="input-field col s10 offset-s2">
                            <select id="selectPicture" name="selectPicture">
                                <option value="" disabled selected></option>
                                <?php foreach ($pictureProfilList as $pictureDetail) { ?>
                                    <option value="<?= $pictureDetail->id ?>"><?= $pictureDetail->name ?></option>
                                <?php } ?>
                            </select>
                            <p id="error"><?= isset($formError['selectPicture']) ? $formError['selectPicture'] : '' ?></p>
                        </div>
                        <div class="col s10  l2 offset-l9">
                            <button id="submitButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="submit">CHANGER</button>
                        </div>
                    </form>
                </div>
                <form id="changePasswordForm" class="col s10" action="profileTeacher.php" method="POST">
                    <div class="input-field col s10 offset-s2">
                        <input id="password" name="password" type="password" value="<?= isset($password) ? $password : '' ?>" />
                        <label for="password">Nouveau mot de passe</label>
                        <p id="error"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                    </div>
                    <div class="input-field col s10 offset-s2">
                        <input id="passwordVerify" name="passwordVerify" type="password" value="<?= isset($passwordVerify) ? $passwordVerify : '' ?>" />
                        <label for="passwordVerify">Confirmer le nouveau mot de passe</label>
                        <p id="error"><?= isset($formError['passwordVerify']) ? $formError['passwordVerify'] : '' ?></p>
                    </div>
                    <div class="col s10 l2 offset-l9">
                        <button id="submitButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="changePasswordSubmit">CHANGER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div>
        <p>Vous devez être connecté pour accéder à cette partie du site.</p>
        <a id="redirectionButton" class="waves-effect waves-light btn-large z-depth-4" href="../index.php">Page d'accueil</a>
    </div>
<?php } ?>
</main>
<?php include '../footer.php'; ?>
</body>
</html>