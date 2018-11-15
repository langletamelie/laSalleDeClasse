//menuburger
$('.button-collapse').sideNav();
$('.dropdown-button').dropdown('open');
$('.dropdown-button').dropdown('close');

//select du choix de la catégorie pour la recherche d'activité
  $(document).ready(function() {
    $('#selectCategories').material_select();
  });

//select multiple du choix du ou des niveaux scolaire pour la recherche d'activité
  $(document).ready(function() {
    $('#selectSchoolDegrees').material_select();
  });

  //textarea du formulaire d'ajout d'ateliers
  //textarea de la préparation d'atelier
  $('#planning').val('');
  $('#planning').trigger('autoresize');
  //textarea du déroulé de l'atelier
  $('#progress').val('');
  $('#progress').trigger('autoresize');
  //textarea du résultat de l'atelier
  $('#resultOfActivity').val('');
  $('#resultOfActivity').trigger('autoresize');

  //pour la page de profil: affichage dynamique des catégories sélectionnées
  $(document).ready(function(){
    $('#cardTower-show-hide').click(function(){
      $('#cardTower').toggle('slow');
    });
    $('#cardBlade-show-hide').click(function(){
      $('#cardBlade').toggle('slow');
    });
    $('#cardFan-show-hide').click(function(){
      $('#cardFan').toggle('slow');
    });
  });