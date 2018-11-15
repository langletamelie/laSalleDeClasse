<?php

$activity = NEW activities();
$category = NEW categories(); 
$schoolDegree = NEW schoolDegrees();

$categoriesList = $category->getCategoriesList();
$schoolDegreesList = $schoolDegree->getSchoolDegreesList();

$name = &$activity->name;
$object = &$activity->object;
$planning = &$activity->planning;
$progress = &$activity->progress;
$resultOfActivity = &$activity->resultOfActivity;

//déclaration de la regex pour les champs lastname, firstname, city, username et password
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        //déclaration de la variable avec le htmlspecialchars
        $name = htmlspecialchars($_POST['name']);
        if (!preg_match($regexName, $lastname)) {
            //test avec la regex : si le champs n'est pas correctement rempli, on stocke le message d'erreur dans le tableau d'erreur
            $formError['name'] = 'La saisie du nom de l\'activité est invalide';
        }
        if (empty($lastname)) {
             //si le champs est vide, on stocke le message d'erreur dans le tableau correspondant
            $formError['name'] = 'Veuillez indiquer votre nom';
        }
    }
    if (isset($_POST['object'])) {
        $object = htmlspecialchars($_POST['object']);
        if (!preg_match($regexName, $object)) {
            $formError['object'] = 'La saisie de l\'objectif de l\'atelier est invalide';
        }
        if (empty($object)) {
            $formError['object'] = 'Veuillez indiquer l\'objectif de l\'atelier';
        }
    }
    if (isset($_POST['planning'])) {
        $planning = htmlspecialchars($_POST['planning']);
        if (!preg_match($regexName, $planning)) {
            $formError['planning'] = 'La saisie de la préparation de l\'atelier est invalide';
        }
        if (empty($planning)) {
            $formError['planning'] = 'Veuillez indiquer comment vous préparez votre atelier';
        }
    }
    if (isset($_POST['progress'])) {
        $progress = htmlspecialchars($_POST['progress']);
        if (!preg_match($regexName, $progress)) {
            $formError['progress'] = 'La saisie du déroulement de l\'atelier est invalide';
        }
        if (empty($progress)) {
            $formError['progress'] = 'Veuillez indiquer comment se déroule l\'atelier';
        }
    }
    if (isset($_POST['resultOfActivity'])) {
        $resultOfActivity = htmlspecialchars($_POST['resultOfActivity']);
        if (!preg_match($regexName, $resultOfActivity)) {
            $formError['resultOfActivity'] = 'La saisie du résultat de l\'atelier est invalide';
        }
        if (empty($resultOfActivity)) {
            $formError['resultOfActivity'] = 'Veuillez indiquer le résultat obtenu lors de l\'atelier';
        }
    }
    if (count($formError) == 0) {
        return $activity->addActivity();
    }
}


