<?php

$username = '';
$errorList = array();
$message = '';

if (isset($_POST['connectionButton'])) {
if (!empty($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
} else {
    $errorList['username'] = 'Erreur dans la saisie de votre identifiant';
}

if (!empty($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $errorList['password'] = 'Erreur dans la saisie de votre mot de passe';
}


if (count($errorList) == 0) {
    $teacher = NEW teachers();
    $teacher->username = $username;
    if ($teacher->teacherConnection()) {
        if(password_verify($password, $teacher->password)) {
        //on rempli la session avec les attributs de l'objet issu de l'hydratation
        $_SESSION['username'] = $teacher->username;
        $_SESSION['id'] = $teacher->id;
        $_SESSION['isConnect'] = true;
         //On redirige l'utilisateur vers la page de recherche d'atelier
         header('location:searchActivity.php');
         exit;
        } else {
            $message = 'Mauvais mot de passe';
        }
    } else {
        $message = 'Erreur lors de la tentative de connexion';
    }
}
}