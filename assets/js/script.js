//menuburger
$(document).ready(function () {
    $('.button-collapse').sideNav();
    $('.dropdown-button').dropdown('open');
    $('.dropdown-button').dropdown('close');

//select du choix de la catégorie pour la recherche d'activité
    $('#selectCategories').material_select();

//select multiple du choix du niveau scolaire pour la recherche d'activité
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
    $('#profilPictureChoice').hide();
    $('#favoritesActivities').hide();
    $('#addHisActivities').hide();
    $('#modifyProfil').hide();

//pour la page de profil: affichage dynamique des catégories sélectionnées
$('#profilCard').click(function () {
    $('#profilPictureChoice').toggle('slow');
  });
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
//tinymce
tinymce.init({
    selector: '.mytextarea',theme: "modern",
    plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor',
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking',
        'table contextmenu directionality emoticons paste textcolor responsivefilemanager code'
      
    ],
    width: 1240,
    height: 400,
    a_plugin_option: true,
    a_configuration_option: 400,
   toolbar: 'newdocument | bold | italic | underline | strikethrough | alignleft | aligncenter, alignright, alignjustify, styleselect, formatselect, fontselect, fontsizeselect, cut, copy, paste, bullist, numlist, outdent, indent, blockquote, undo, redo, removeformat, subscript, superscript, responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ',

   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"../cmpsTiny/filemanager/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "filemanager/filemanager/plugin.min.js"}
});