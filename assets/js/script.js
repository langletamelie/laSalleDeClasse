//menuburger
$(document).ready(function () {
    $('.button-collapse').sideNav();
    $('.dropdown-button').dropdown('open');
    $('.dropdown-button').dropdown('close');

//select du choix de la catégorie pour la recherche d'activité
    $('#selectCategories').material_select();


//select multiple du choix du ou des niveaux scolaire pour la recherche d'activité
    $('#selectSchoolDegrees').material_select();


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

//cacher les différentes catégories de la page de profil par défaut
    $('#favoritesActivities').hide();
    $('#addHisActivities').hide();
    $('#modifyProfil').hide();

//pour la page de profil: affichage dynamique des catégories sélectionnées
$('#favoritesActivities-show-hide').click(function () {
  $('#favoritesActivities').toggle('slow');
});
$('#addHisActivities-show-hide').click(function () {
  $('#addHisActivities').toggle('slow');
});
$('#modifyProfil-show-hide').click(function () {
  $('#modifyProfil').toggle('slow');
});
//select du choix de la photo de profil
$('#selectPicture').material_select();
});