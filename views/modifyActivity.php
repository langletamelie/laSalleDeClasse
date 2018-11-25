<?php
include '../header.php';
include '../controllers/modifyActivityController.php';
?>

<?php if (isset($_SESSION['isConnect'])) { ?>
    <?php if (isset($_POST['submit']) && (count($formError) === 0)) { ?> 
        <p id="ok">Les données modifiées ont été enregistrées</p>           
    <?php } else { ?>   
        <div class="container-fluid">
            <h1>Modifier votre atelier</h1>
            <div class="row">
                <form id="modifyActivityForm" class="col l10 blue-grey darken-1" action="modifyActivity.php?id=<?= $displayAnActivity->id ?>" method="POST">
                    <div class="input-field col l10 offset-l1">
                        <input id="name" name="name" type="text" value="<?= $displayAnActivity->name ?>" />
                        <label for="name">Nom de l'activité </label>
                        <p id="error"><?= isset($formError['name']) ? $formError['name'] : '' ?></p>
                    </div>
                    <label class="col l10 offset-l1" for="selectCategories">Catégorie(s)</label>
                    <div class="col l10 offset-l1">
                        <select id="selectCategories" name="selectCategories">
                            <?php foreach ($categoriesList as $categoryDetail) { ?>
                                <option value="<?= $categoryDetail->id ?>" <?= $categoryDetail->id == $displayAnActivity->idCategories ? 'active' : ""; ?>> <?= $categoryDetail->name ?></option>
                            <?php } ?>
                        </select>
                        <p id="error"><?= isset($formError['selectCategories']) ? $formError['selectCategories'] : '' ?></p>
                    </div>
                    <label class="col l10 offset-l1" for="selectSchoolDegrees">Niveau(x) scolaire(s)</label>
                    <div class="col l10 offset-l1">
                        <select multiple id="selectSchoolDegrees" name="selectSchoolDegrees[]">
                            <?php foreach ($schoolDegreesList as $schoolDegreeDetail) { ?>
                                <option value="<?= $schoolDegreeDetail->id ?>" ><?= $schoolDegreeDetail->name ?></option>
                            <?php } ?>
                        </select>
                        <p id="error"><?= isset($formError['selectSchoolDegrees']) ? $formError['selectSchoolDegrees'] : '' ?></p>
                    </div>
                    <div class="input-field col l10 offset-l1">
                        <input id="object" name="object" type="text" value="<?= $displayAnActivity->object ?>" />
                        <label for="object">Objectif de l'atelier</label>
                        <p id="error"><?= isset($formError['object']) ? $formError['object'] : '' ?></p>
                    </div>
                    <div class="input-field col l10 offset-l1">
                        <textarea name="planning" class="materialize-textarea"><?= $displayAnActivity->planning ?></textarea>
                        <label for="planning">Préparatifs de l'atelier</label>
                        <p id="error"><?= isset($formError['planning']) ? $formError['planning'] : '' ?></p>
                    </div>
                    <div class="input-field col l10 offset-l1">
                        <textarea name="progress" class="materialize-textarea"><?= $displayAnActivity->progress ?></textarea>
                        <label for="progress">Déroulement de l'atelier</label>
                        <p id="error"><?= isset($formError['progress']) ? $formError['progress'] : '' ?></p>
                    </div>
                    <div class="input-field col l10 offset-l1">
                        <textarea name="resultOfActivity" class="materialize-textarea"><?= $displayAnActivity->resultOfActivity ?></textarea>
                        <label for="resultOfActivity">Résultats de l'atelier</label>
                        <p id="error"><?= isset($formError['resultOfActivity']) ? $formError['resultOfActivity'] : '' ?></p>
                    </div>
                    <div class="col l2 offset-l8">
                        <button id="modifyAct" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="modifyAct">MODIFIER</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
<?php } else { ?>
    <div>
        <p id="messageNotConnected">Vous devez être connecté pour accéder à cette partie du site.</p>
        <a id="redirectionButton" class="waves-effect waves-light btn-large z-depth-4" href="../index.php">Page d'accueil</a>
    </div>
<?php } ?>
</main>
<?php include '../footer.php'; ?>
</body>
</html>