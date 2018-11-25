<?php
include '../header.php';
include '../controllers/displayActivityController.php';
?>

<?php if (isset($_SESSION['isConnect'])) { ?>


    <div class="row col s12 m5 l10 offset-l1">
    <div class="col s12 m5 l8 offset-l2">
        <div class="card-panel teal blue-grey darken-2">
            <h4>Nom de l'activité</h4>
            <p><?= $displayAnActivity->name ?></p>
        </div>
    </div>
    <div class="col s12 m5 l8 offset-l2">
        <div class="card-panel teal blue-grey darken-2">
            <h4>Objectif de l'atelier</h4>
            <p><?= $displayAnActivity->object ?></p>
        </div>
        </div>
        <div class="col s12 m5 l8 offset-l2">
        <div class="card-panel teal blue-grey darken-2">
            <h4>Préparatifs de l'atelier</h4>
            <p><?= $displayAnActivity->planning ?></p>
        </div>
        </div>
        <div class="col s12 m5 l8 offset-l2">
        <div class="card-panel teal blue-grey darken-2">
            <h4>Déroulement de l'atelier</h4>
            <p><?= $displayAnActivity->progress ?></p>
        </div>
        </div>
        <div class="col s12 m5 l8 offset-l2">
        <div class="card-panel teal blue-grey darken-2">
            <h4>Résultat de l'atelier</h4>
            <p><?= $displayAnActivity->resultOfActivity ?></p>
        </div>
        </div>
        <div class="col s12 m5 l8 offset-l2">
        <form action="#" method="POST">
            <button id="addActInFav" class="btn waves-effect waves-light z-depth-4" type="submit" name="addActInFav">Ajouter aux favoris</button>
        </form>
        </div>
        <?php if (isset($_POST['addActInFav']) && ($check != 0)) { ?>
            <p id="messageOk">Vous avez déjà enregistré cet atelier dans vos favoris</p>
        <?php } ?>
    </div>




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