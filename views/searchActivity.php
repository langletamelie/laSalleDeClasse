<?php
include '../header.php';
include '../controllers/searchActivityController.php';
?>
<?php if (isset($_SESSION['isConnect'])) { ?>
    <div class="container-fluid">
        <h1>Chercher un atelier</h1>
        <div class="row">
            <form id="searchActivity" class="col l10 blue-grey darken-1" action="#" method="POST">
                <label class="col l10 offset-l1" for="selectCategories">Choissisez une catégorie</label>
                <div class="col l10 offset-l1">
                    <select id="selectCategories" name="selectCategories">
                        <option value="" disabled selected></option>
                        <?php foreach ($categoriesList as $categoryDetail) { ?>
                            <option value="<?= $categoryDetail->id ?>"><?= $categoryDetail->name ?></option>
                        <?php } ?>
                    </select>
                    <p id="error"><?= isset($formError['selectCategories']) ? $formError['selectCategories'] : '' ?></p>
                </div>
                <label class="col l10 offset-l1" for="selectSchoolDegrees">Choissisez un niveau scolaire</label>
                <div class="col l10 offset-l1">
                    <select id="selectSchoolDegrees" name="selectSchoolDegrees">
                        <option value="" disabled selected></option>
                        <?php foreach ($schoolDegreesList as $schoolDegreeDetail) { ?>
                            <option value="<?= $schoolDegreeDetail->id ?>"><?= $schoolDegreeDetail->name ?></option>
                        <?php } ?>
                    </select>
                    <p id="error"><?= isset($formError['selectSchoolDegrees']) ? $formError['selectSchoolDegrees'] : '' ?></p>
                </div>
                <div class="col l2 offset-l8">
                    <button id="submitButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="submit">CHERCHER</button>
                </div>
            </form>
        </div>
    </div>
    <?php if (isset($_POST['submit']) && (count($formError) == 0)) { ?>
        <!-- affichage des ateliers sélectionnés -->
        <div class="row">
            <div class="col m6 offset-l2">
                <?php foreach ($displayActivity as $activityDetail) { ?> 
                    <div class="card blue-grey darken-2 col s12 m6 l5 offset-l1">
                        <div class="card-content white-text">
                            <p>Nom de l'atelier : <?= $activityDetail->name ?></p>
                            <p>Objectif de l'atelier : <?= $activityDetail->object ?></p>
                        </div>
                        <div class="card-action">
                            <a href="displayActivity.php?id=<?= $activityDetail->id ?>">Voir l'activité</a>
                        </div>
                    </div>
                <?php } ?>
                <p id="error"><?= isset($message) ? $message : '' ?></p>
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