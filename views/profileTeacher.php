<?php include '../header.php'; ?>

<?php if (isset($_SESSION['isConnect'])) { ?>
    <div class="row">
        <div class="col s12 m4 l3">
            <div class="card small">
                <div class="card-image">
                    <img src="images/sample-1.jpg">
                    <span class="card-title">Card Title</span>
                </div>
            </div>
            <div class="card-panel teal">
                <a id="favoritesActivities-show">MES ATELIERS PRÉFÉRÉS</a>
            </div>
            <div class="card-panel teal">
                <a id="addHisActivities-show">MES ATELIERS PROPOSÉS</a>
            </div>
            <div class="card-panel teal">
                <a id="modifyProfil-show">MODIFIER MON COMPTE</a>
            </div>
        </div>
        <div class="col s12 m8 l9">
            <div id="favoritesActivities"> 
                <?php if (isset($favoritesActivities)) { ?>
                    <p></p>
                <?php } else { ?>
                    <p>Vous n'avez pas encore enregistré d'ateliers en favoris</p>
                <?php } ?>
            </div>
            <div id="addHisActivities"> 
                <?php if (isset($addHisActivities)) { ?>
                    <p></p>
                <?php } else { ?>
                    <p>Vous n'avez pas encore proposé d'ateliers</p>
                <?php } ?>
            </div>
        </div>
        <div id="modifyProfil"> 
            <p></p>
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