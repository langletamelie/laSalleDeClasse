<?php
include '../header.php';
include '../controllers/searchActivityController.php';
?>
<?php if (isset($_SESSION['isConnect'])) { ?>

    <div class="container-fluid">
        <div class="row">
            <form id="searchActivity" class="col s10" action="#" method="POST">
                <label class="col s10 offset-s2" for="selectCategories">Choissisez une catégorie</label>
                <div class="input-field col s10 offset-s2">
                    <select id="selectCategories" name="selectCategories">
                        <option value="" disabled selected></option>
                        <?php foreach ($categoriesList as $categoryDetail) { ?>
                            <option value="<?= $categoryDetail->id ?>"><?= $categoryDetail->name ?></option>
                        <?php } ?>
                    </select>
                    <p id="error"><?= isset($formError['selectCategories']) ? $formError['selectCategories'] : '' ?></p>
                </div>
                <label class="col s10 offset-s2" for="selectSchoolDegrees">Choissisez un ou plusieurs niveau scolaire</label>
                <div class="input-field col s10 offset-s2">
                    <select multiple id="selectSchoolDegrees" name="selectSchoolDegrees">
                        <option value="" disabled selected></option>
                        <?php foreach ($schoolDegreesList as $schoolDegreeDetail) { ?>
                            <option value="<?= $schoolDegreeDetail->id ?>"><?= $schoolDegreeDetail->name ?></option>
                        <?php } ?>
                    </select>
                    <p id="error"><?= isset($formError['selectSchoolDegrees']) ? $formError['selectSchoolDegrees'] : '' ?></p>
                </div>
                <div class="col s10 col l2 offset-l9">
                    <button id="submitButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="submit">CHERCHER</button>
                </div>
            </form>
        </div>
    </div>



<?php if (isset($_POST['submit']) && (count($formError) === 0)) { ?>

   <!-- affichage des ateliers sélectionnés -->
    <div>
          <?php  foreach ($displayActivity as $activityDetail) { ?> 
               <p>Nom de l'atelier<?= $activityDetail->name ?></p>
               <p>Nom de l'atelier<?= $activityDetail->object ?></p>
               <p>Nom de l'atelier<?= $activityDetail->planning ?></p>
               <p>Nom de l'atelier<?= $activityDetail->progress ?></p>
               <p>Nom de l'atelier<?= $activityDetail->resultOfActivity ?></p>
           <?php } ?>
       </div>

<?php } ?>
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