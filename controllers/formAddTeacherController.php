<?php

//instanciation de la variable teacher
$teacher = NEW teachers();

$lastname = '';
$firstname = '';
$city = '';
$username = '';
$password = '';
$mail = '';
//déclaration de la regex pour les champs lastname, firstname, city, username et password
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//déclaration du tableau d'erreur
$formError = array();

//A la validation du formulaire
if (isset($_POST['inscriptionButton'])) {
//Si lastname existe , faire un test avec la regex correspondante. Si c'est valide on stocke la valeur dans $lastname.
    if (isset($_POST['lastname'])) {
        //déclaration de la variable lastname avec le htmlspecialchars
        $lastname = htmlspecialchars(ucwords(strtolower($_POST['lastname'])));
        if (!preg_match($regexName, $lastname)) {
            //test avec la regex : Si le champs n'est pas correctement rempli, on stocke le message d'erreur dans le tableau d'erreur
            $formError['lastname'] = 'La saisie de votre nom est invalide';
        }
        if (empty($lastname)) {
            //si le champs est vide, on stocke le message d'erreur dans le tableau correspondant
            $formError['lastname'] = 'Veuillez indiquer votre nom';
        }
    }
    if (isset($_POST['firstname'])) {
        $firstname = htmlspecialchars(ucwords(strtolower($_POST['firstname'])));
        if (!preg_match($regexName, $firstname)) {
            $formError['firstname'] = 'La saisie de votre prénom est invalide';
        }
        if (empty($firstname)) {
            $formError['firstname'] = 'Veuillez indiquer votre prénom';
        }
    }
    if (isset($_POST['city'])) {
        $city = htmlspecialchars(ucwords(strtolower($_POST['city'])));
        if (!preg_match($regexName, $city)) {
            $formError['city'] = 'La saisie de votre ville est invalide';
        }
        if (empty($city)) {
            $formError['city'] = 'Veuillez indiquer votre ville';
        }
    }
    if (isset($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
        if (!preg_match($regexName, $username)) {
            $formError['username'] = 'La saisie de votre nom d\'utilisateur est invalide';
        }
        if (empty($username)) {
            $formError['username'] = 'Veuillez choisir un nom d\'utilisateur';
        }
        if ($check = $teacher->checkIfUsernameExist() != 0) {
            $formError['username'] = 'Le nom d\'utilisateur que vous avez choisi existe déjà';
        }
    }
    //condition pour réaliser une confirmation de mot de passe
    if (!empty($_POST['password']) && (!empty($_POST['passwordVerify'])) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        //si le champs est vide, afficher un message d'erreur
        $formError['password'] = 'Veuillez choisir un mot de passe';
    }
    if (isset($_POST['mail'])) {
        //déclaration de la variable mail avec le htmlspecialchars et on met le tout en minuscule
        $mail = htmlspecialchars(strtolower($_POST['mail']));
        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            //test avec le filter_var pour vérifier la validité du champs mail
            $formError['mail'] = 'La saisie de votre mail est invalide';
        }
        if (empty($mail)) {
            $formError['mail'] = 'Veuillez indiquer votre mail';
        }
    }
    //Si l'utilisateur ne coche pas les cases, il ne pourra pas se connecter.
    if (empty($_POST['certifyTeacher'])) {
        $formError['certifyTeacher'] = 'Si vous voulez vous inscrire vous devez certifier être un professeur';
    }
    if (empty($_POST['termsOfUse'])) {
        $formError['termsOfUse'] = 'Si vous voulez vous inscrire vous devez certifier être un professeur';
    }

//s'il n'y a pas d'erreur dans le formulaire, on vérifie que le professeur n'est pas déjà dans la base de données
    if (count($formError) == 0) {

        $teacher->lastname = $lastname;
        $teacher->firstname = $firstname;
        $teacher->city = $city;
        $teacher->username = $username;
        $teacher->password = $password;
        $teacher->mail = $mail;
        $check = $teacher->checkIfTeacherExist();
        //s'il n'existe pas dans la base de données, alors on l'y ajoute

        if ($check == 0) {
            return $teacher->addTeacher();
        }
    }
}
