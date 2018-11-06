<?php include '../header.php'; ?>

<body>
<main>
    <div class="container-fluid">
      <div class="row">
        <form class="col s10" action="#">
          <div class="input-field col s10 offset-s2">
            <input id="username" type="text" class="validate">
            <label for="username">Nom d'utilisateur</label>
          </div>
          <div class="input-field col s10 offset-s2">
            <input id="password" type="text" class="validate">
            <label for="password">Mot de passe</label>
          </div>
          <div class="col s10 col l2 offset-l9">
            <button id="connectionButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="submit">CONNEXION</button>
          </div>
        </form>
      </div>
    </div>
  </main>
    <?php include '../footer.php'; ?>
</body>
</html>