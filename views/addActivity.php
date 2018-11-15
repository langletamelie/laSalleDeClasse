<?php
include '../header.php';
include '../controllers/addActivityController.php';
?>

<?php if (isset($_SESSION['isConnect'])) { ?>
    <div class="container-fluid">
        <div class="row">
            <form id="addActivity" class="col s10" action="#" method="POST">
                <div class="input-field col s10 offset-s2">
                    <input id="name" name="name" type="text" value="<?= isset($name) ? $name : '' ?>" />
                    <label for="name">Nom de l'activité</label>
                    <p id="error"><?= isset($formError['name']) ? $formError['name'] : '' ?></p>
                </div>
                <label class="col s10 offset-s2" for="selectCategories">Choissisez une catégorie</label>
                <div class="input-field col s10 offset-s2">
                    <select id="selectCategories" name="selectCategories">
                        <option value="" disabled selected></option>
                        <?php foreach ($categoriesList as $categoryDetail) { ?>
                            <option value="<?= $categoryDetail->id ?>"><?= $categoryDetail->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <label class="col s10 offset-s2" for="selectSchoolDegrees">Choissisez un ou plusieurs niveau scolaire</label>
                <div class="input-field col s10 offset-s2">
                    <select multiple id="selectSchoolDegrees" name="selectSchoolDegrees">
                        <option value="" disabled selected></option>
                        <?php foreach ($schoolDegreesList as $schoolDegreeDetail) { ?>
                            <option value="<?= $schoolDegreeDetail->id ?>"><?= $schoolDegreeDetail->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-field col s10 offset-s2">
                    <input id="object" name="object" type="text" value="<?= isset($object) ? $object : '' ?>" />
                    <label for="object">Objectif de l'atelier</label>
                    <p id="error"><?= isset($formError['object']) ? $formError['object'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <textarea id="planning" name="planning" class="materialize-textarea" value="<?= isset($planning) ? $planning : '' ?>" ></textarea>
                    <label for="planning">Préparatifs de l'atelier</label>
                    <p id="error"><?= isset($formError['planning']) ? $formError['planning'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <textarea id="progress" name="progress" class="materialize-textarea" value="<?= isset($progress) ? $progress : '' ?>" ></textarea>
                    <label for="progress">Déroulement de l'atelier</label>
                    <p id="error"><?= isset($formError['progress']) ? $formError['progress'] : '' ?></p>
                </div>
                <div class="input-field col s10 offset-s2">
                    <textarea id="resultOfActivity" name="resultOfActivity" class="materialize-textarea" value="<?= isset($resultOfActivity) ? $resultOfActivity : '' ?>" ></textarea>
                    <label for="resultOfActivity">Résultats de l'activité</label>
                    <p id="error"><?= isset($formError['resultOfActivity']) ? $formError['resultOfActivity'] : '' ?></p>
                </div>
                <div class="col s10 col l2 offset-l9">
                    <button id="submitButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="submit">AJOUTER</button>
                </div>
            </form>
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