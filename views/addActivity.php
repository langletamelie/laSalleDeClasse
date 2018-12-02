<?php
include '../header.php';
include '../controllers/addActivityController.php';
?>
<!-- si l'utilisateur est connecté on affiche la page -->
<?php if (isset($_SESSION['isConnect'])) { ?>
    <div class="container-fluid">
        <div class="row">
            <h1>Ajouter un atelier</h1>
            <!-- Formulaire d'ajout d'atelier -->
            <form id="addActivity" class="col l10 blue-grey darken-1" action="#" method="POST">
                <div class="input-field col l10 offset-l1">
                <!-- input permettant à l'utilisateur de remplir le formulaire, avec une ternaire dans la value qui permet de garder la valeur rentrée par l'utilisateur -->
                    <input id="name" name="name" type="text" value="<?= isset($name) ? $name : '' ?>" />
                    <label for="name">Nom de l'atelier</label>
                    <!-- message d'erreur pour le champs du nom de l'atelier -->
                    <p id="error"><?= isset($formError['name']) ? $formError['name'] : '' ?></p>
                </div>
                <label class="col l10 offset-l1" for="selectCategories">Choissisez une catégorie</label>
                <div class="col l10 offset-l1">
                    <select id="selectCategories" name="selectCategories">
                        <option value="" disabled selected></option>
                        <!-- boucle affichant la liste des catégories présentes dans la base de données -->
                        <?php foreach ($categoriesList as $categoryDetail) { ?>
                            <option value="<?= $categoryDetail->id ?>"><?= $categoryDetail->name ?></option>
                        <?php } ?>
                    </select>
                    <p id="error"><?= isset($formError['selectCategories']) ? $formError['selectCategories'] : '' ?></p>
                </div>
                <label class="col l10 offset-l1" for="selectSchoolDegrees">Choissisez le ou les niveau(x) scolaire(s)</label>
                <div class="col l10 offset-l1">
                    <select multiple id="selectSchoolDegrees" name="selectSchoolDegrees[]">
                        <option value="" disabled selected></option>
                         <!-- boucle affichant la liste des niveaux scolaires présents dans la base de données -->
                        <?php foreach ($schoolDegreesList as $schoolDegreeDetail) { ?>
                            <option value="<?= $schoolDegreeDetail->id ?>"><?= $schoolDegreeDetail->name ?></option>
                        <?php } ?>
                    </select>
                    <p id="error"><?= isset($formError['selectSchoolDegrees']) ? $formError['selectSchoolDegrees'] : '' ?></p>
                </div>
                <div class="input-field col l10 offset-l1">
                    <input id="object" name="object" type="text" value="<?= isset($object) ? $object : '' ?>" />
                    <label for="object">Objectif de l'atelier</label>
                    <p id="error"><?= isset($formError['object']) ? $formError['object'] : '' ?></p>
                </div>
                <div class="input-field col l10 offset-l1">
                    <!-- textarea pour que le professeur puisse détailler au mieux l'atelier, sans contraintes de nombres de caractères -->
                    <textarea id="planning" class="materialize-textarea" name="planning"><?= $activity->planning ?></textarea>
                    <label for="planning">Préparatifs de l'atelier (matériel, organisation...)</label>
                    <p id="error"><?= isset($formError['planning']) ? $formError['planning'] : '' ?></p>
                </div>
                <div class="input-field col l10 offset-l1">
                    <textarea id="progress" class="materialize-textarea" name="progress"><?= $activity->progress ?></textarea>
                    <label for="progress">Déroulement de l'atelier avec les élèves</label>
                    <p id="error"><?= isset($formError['progress']) ? $formError['progress'] : '' ?></p>
                </div>
                <div class="input-field col l10 offset-l1">
                    <textarea id="resultOfActivity" class="materialize-textarea" name="resultOfActivity"><?= $activity->resultOfActivity ?></textarea>
                    <label for="resultOfActivity">Résultats de l'atelier</label>
                    <p id="error"><?= isset($formError['resultOfActivity']) ? $formError['resultOfActivity'] : '' ?></p>
                </div>
                <!-- bouton de validation du formulaire -->
                <div class="col l2 offset-l8">
                    <button id="addActivityButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="addActivityButton">AJOUTER</button>
                </div>
            </form>
            <!-- message informant si l'activité à été ajouté ou s'il y a eu une erreur-->
            <p id="actvitityMessage"><?= isset($message) ? $message : '' ?></p>
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