<?php

$pictureProfil = NEW picturesProfil();
$pictureProfilList = $pictureProfil->getPicturesProfilList();


$formError = array();

if (!empty($_SESSION['id'])) {
    $teacher = NEW teachers();
    $teacher->id = $_SESSION['id'];
    $teacherList = $teacher->displayProfilTeacher();
}

//select pour choisir une photo de profil

if (isset($_POST['submit'])) {
  if (!empty($_POST['selectPicture'])) {
    $pictureProfil = $_POST['selectPicture'];
    $teacher->idPicturesProfil = $pictureProfil;
    $teacher->id = $_SESSION['id'];
    $teacher->changePictureProfil();
    } else {
     $formError['selectPicture'] = 'Veuillez choisir une photo de profil';
    }
}

//afficher les ateliers proposés par le professeur
      if (!empty($_SESSION['id'])) {
      $activity = NEW activities();
      $activity->idTeachers = $_SESSION['id'];
      $displayActivity = $activity->getActivityThatTheTeacherProposed();
      }

//afficher les ateliers favoris du professeur
if (!empty($_SESSION['id'])) {
    $favorite = NEW favorites();
    $favorite->idTeachers = $_SESSION['id'];
    $favorite->idActivities = $idActivities;
    $displayFavoritesActivities = $favorite->getFavoriteActivityOfATeacher();
    }

//changement du mot de passe 
if (isset($_POST['changePasswordSubmit'])) {
if (!empty($_POST['password']) && (!empty($_POST['passwordVerify'])) && $_POST['password'] == $_POST['passwordVerify']) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $teacher->password = $password;
    $teacher->id = $_SESSION['id'];
    $teacher->modifyPasswordByTeacher();
 } else {
        $formError['password'] = 'La saisie est invalide';
    }
}