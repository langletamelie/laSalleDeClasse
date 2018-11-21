<?php
include '../header.php';
include '../controllers/displayActivityController.php';
?>

<?php if (isset($_SESSION['isConnect'])) { ?>
   

   <div>
   <p>Nom de l'activité : <?= $displayAnActivity->name ?></p>
   <p>Objectif de l'atelier : <?= $displayAnActivity->object ?></p>
   <p>Préparatifs de l'atelier : <?= $displayAnActivity->planning ?></p>
   <p>Déroulement de l'atelier : <?= $displayAnActivity->progress ?></p>
   <p>Résultat de l'atelier : <?= $displayAnActivity->resultOfActivity ?></p>
   <form action="#" method="POST">
   <button id="addActInFav" class="btn waves-effect waves-light z-depth-4" type="submit" name="addActInFav">Ajouter aux favoris</button>
   </form>

   <?php if (isset($_POST['addActInFav']) && ($check != 0)) { ?>
 <p id="messageOk">Vous avez déjà enregistrer cet atelier dans vos favoris</p>
   <?php } ?>
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