<?php
include '../header.php';
include '../controllers/profileTeacherController.php';
?>
<!-- si l'utilisateur est connecté on affiche la page -->
<?php if (isset($_SESSION['isConnect'])) { ?>
    <div class="row">
        <div class="col s12 m4 l3">
            <!-- carte de profil qui affiche la photo de profil ainsi que le nom d'utilisateur -->
            <div class="card" id="profilCard">
                <div class="card-image">
                    <img src="../assets/picturesProfil/<?= $teacherList->name ?>.jpg" id="pictureProfil">
                </div>
                <div class="card-content">
                    <p><?= $_SESSION['username'] ?></p>
                </div>
            </div>
            <!-- cartes qui permettent d'afficher ou cacher les choix de l'utilisateur -->
            <div class="card-panel teal blue-grey darken-1" id="favoritesActivities-show-hide">
                <p>MES ATELIERS PRÉFÉRÉS</p>
            </div>
            <div class="card-panel teal blue-grey darken-1" id="addHisActivities-show-hide">
                <p>LES ATELIERS QUE J'AI PROPOSÉ</p>
            </div>
            <div class="card-panel teal blue-grey darken-1" id="modifyProfil-show-hide">
                <p>MODIFIER MON COMPTE</p>
            </div>
        </div>
        <div class="col s12 m8 l9">
            <div id="favoritesActivities"> 
                <!--Boucle permettant l'affichage des favoris enregistrés par l'utilisateur -->
                <?php foreach ($displayFavoritesActivities as $favoriteActivityDetail) { ?>
                    <div class="card blue-grey darken-1 col s12 m6 l5 offset-l1">
                        <div class="card-content white-text">
                            <p>Nom de l'atelier : <?= $favoriteActivityDetail->name ?></p>
                            <p>Objectif de l'atelier : <?= $favoriteActivityDetail->object ?></p>
                        </div>
                        <!-- bouton permettant l'affichage complet de l'atelier -->
                        <div class="card-action">
                            <a href="displayActivity.php?id=<?= $favoriteActivityDetail->id ?>">Voir l'activité</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div id="addHisActivities"> 
                <!-- boucle permettant l'affichage des ateliers que le professeur a ajouté-->
                <?php foreach ($displayActivity as $activityDetail) { ?>
                    <div class="card blue-grey darken-1 col s12 m6 l5 offset-l1">
                        <div class="card-content white-text">
                            <p>Nom de l'activité : <?= $activityDetail->name ?></p>
                            <p>Objectif de l'activité : <?= $activityDetail->object ?></p>
                        </div>
                        <div class="card-action">
                           <a href="displayActivity.php?id=<?= $activityDetail->id ?>">VOIR</a>
                           <a href="modifyActivity.php?id=<?= $activityDetail->id ?>">MODIFIER</a>
                            <!-- modale de la suppression d'atelier -->
                            <a class="modal-trigger btn waves-effect waves-light red accent-4 z-depth-4" href="#modal1">SUPPRIMER</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- structure de la modale -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <p>Etes-vous sûr de vouloir supprimer l'atelier ?</p>
                    <form action="profileTeacher.php?id=<?= $activityDetail->id ?>" method="POST">
                        <!--bouton de confirmation de suppression d'atelier -->
                        <button id="deleteActivityButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="deleteActivityButton">SUPPRIMER</button>
                        <!-- bouton permettant d'annuler la suppression et de fermer la fenêtre modale -->
                        <button id="cancelButton" class="modal-action modal-close btn waves-effect waves-light btn-large z-depth-4" type="submit" name="cancelButton">ANNULER</button>
                    </form>
                </div>
            </div>
            <div id="profilPictureChoice">
                <!-- changement de la photo de profil-->
                <form id="choosePictureProfil" class="col s10 blue-grey darken-1" action="profileTeacher.php" method="POST">
                    <label class="col s10 offset-s2" for="selectPicture">Choissisez une photo de profil</label>
                    <div class="input-field col s10 offset-s2">
                        <select id="selectPicture" name="selectPicture">
                            <option value="" disabled selected></option>
                            <!-- boucle affichant toutes les photos de profil disponibles -->
                            <?php foreach ($pictureProfilList as $pictureDetail) { ?>
                                <option value="<?= $pictureDetail->id ?>" data-icon="../assets/picturesProfil/<?= $pictureDetail->name ?>.jpg" class="left"></option>
                            <?php } ?>
                        </select>
                        <p id="error"><?= isset($formError['selectPicture']) ? $formError['selectPicture'] : '' ?></p>
                    </div>
                    <div class="col s10  l2 offset-l9">
                        <button id="changePictureSubmit" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="changePictureSubmit">CHANGER</button>
                    </div>
                </form>
            </div>
            <div id="modifyProfil"> 
                <!-- changement du mot de passe -->
                <form id="changePasswordForm" class="col s10 blue-grey darken-1" action="profileTeacher.php" method="POST">
                    <div class="input-field col s10 offset-s2">
                        <input id="password" name="password" type="password" value="<?= isset($password) ? $password : '' ?>" />
                        <label for="password">Nouveau mot de passe</label>
                    </div>
                    <div class="input-field col s10 offset-s2">
                        <input id="passwordVerify" name="passwordVerify" type="password" value="<?= isset($passwordVerify) ? $passwordVerify : '' ?>" />
                        <label for="passwordVerify">Confirmer le nouveau mot de passe</label>
                    </div>
                    <div class="col s10 l2 offset-l9">
                        <button id="changePasswordSubmit" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="changePasswordSubmit">CHANGER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } else { ?>
    <!-- Si une personne est sur la page mais qu'elle n'est pas connectée: affichage d'un message et d'un bouton dirigeant vers la page d'accueil -->
    <div>
        <p id="messageNotConnected">Vous devez être connecté pour accéder à cette partie du site.</p>
        <a id="redirectionButton" class="waves-effect waves-light btn-large z-depth-4" href="../index.php">Page d'accueil</a>
    </div>
<?php } ?>
</main>
<?php include '../footer.php'; ?>
</body>
</html>