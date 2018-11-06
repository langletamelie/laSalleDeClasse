<?php include '../header.php'; ?>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <form class="col s10" action="#">
          <div class="input-field col s10 offset-s2">
            <input id="lastname" type="text" class="validate">
            <label for="lastname">Nom</label>
          </div>
          <div class="input-field col s10 offset-s2">
            <input id="firstname" type="text" class="validate">
            <label for="firstname">Prénom</label>
          </div>
          <div class="input-field col s10 offset-s2">
            <input id="city" type="text" class="validate">
            <label for="city">Ville</label>
          </div>
          <div class="input-field col s10 offset-s2">
            <input id="username" type="text" class="validate">
            <label for="username">Nom d'utilisateur</label>
          </div>
          <div class="input-field col s10 offset-s2">
            <input id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
          <div class="input-field col s10 offset-s2">
            <input id="password" type="password" class="validate">
            <label for="password">Mot de passe</label>
          </div>
          <div class="col s10 offset-s2">
            <p>
              <input type="checkbox" id="teacher" />
              <label for="teacher">En cochant cette case vous certifiez être un professeur</label>
            </p>
          </div>
          <div class="col s10 offset-s2">
            <p>
              <input type="checkbox" id="conditions" />
              <label for="conditions">J'ai lu et accepté les conditions d'utilisation</label>
            </p>
          </div>
          <div class="col s10 col l2 offset-l9">
            <button id="inscriptionButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit" name="submit">INSCRIPTION</button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <?php include '../footer.php'; ?>
</body>
</html>