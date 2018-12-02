<?php
include '../header.php';
include '../controllers/displayActivityController.php';
?>
<!-- si l'utilisateur est connecté on affiche la page -->
<?php if (isset($_SESSION['isConnect'])) { ?>
    <!-- cartes affichant les détails de l'atelier précédemment sélectionné -->
    <div class="row col s12 m5 l10 offset-l1">
        <div class="col s12 m5 l8 offset-l2">
            <div class="card-panel teal blue-grey darken-2">
                <h2>Nom de l'activité</h2>
                <p><?= $displayAnActivity->name ?></p>
            </div>
        </div>
        <div class="col s12 m5 l8 offset-l2">
            <div class="card-panel teal blue-grey darken-2">
                <h2>Objectif de l'atelier</h2>
                <p><?= $displayAnActivity->object ?></p>
            </div>
        </div>
        <div class="col s12 m5 l8 offset-l2">
            <div class="card-panel teal blue-grey darken-2">
                <h2>Préparatifs de l'atelier</h2>
                <pre><?= $displayAnActivity->planning ?></pre>
            </div>
        </div>
        <div class="col s12 m5 l8 offset-l2">
            <div class="card-panel teal blue-grey darken-2">
                <h2>Déroulement de l'atelier</h2>
                <pre><?= $displayAnActivity->progress ?></pre>
            </div>
        </div>
        <div class="col s12 m5 l8 offset-l2">
            <div class="card-panel teal blue-grey darken-2">
                <h2>Résultat de l'atelier</h2>
                <pre><?= $displayAnActivity->resultOfActivity ?></pre>
            </div>
        </div>
        <!-- Bouton pour l'ajout de l'atelier dans les favoris du professeur -->
        <div class="col s12 m5 l8 offset-l2">
            <form action="#" method="POST">
                <button id="addActInFav" class="btn waves-effect waves-light z-depth-4" type="submit" name="addActInFav">Ajouter aux favoris</button>
            </form>
        </div>
        <!-- message pour confirmer que l'atelier a été enregistré en favoris -->
        <div class="col s12 m5 l8 offset-l2">
        <?php if (isset($_POST['addActInFav']) && ($check == 0)) { ?>
            <p id="okFav">L'atelier a été enregistré dans vos favoris</p>
        <?php } ?>
        <!-- message pour indiquer que l'atelier a déjà été enregistré dans les favoris -->
        <?php if (isset($_POST['addActInFav']) && ($check != 0)) { ?>
            <p id="errorFav">Vous avez déjà enregistré cet atelier dans vos favoris</p>
        <?php } ?>
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