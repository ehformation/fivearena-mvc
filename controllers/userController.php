<?php 
require('models/userModels.php');
function inscription() {
    if(isset($_POST["bouton"])){
        $email      = $_POST["email"];
        $nom        = $_POST["nom"];
        $prenom     = $_POST["prenom"];
        $tel        = $_POST["tel"];
        $pass       = $_POST["pass"];
        $confirm    = $_POST["confirm"];
        $id_role    = 2;
        $errors = [];

        $errors = isValidFields($email, $nom, $prenom, $tel,$pass, $confirm);

        if(count($errors) == 0){
            userRegister($email, $nom, $prenom, $tel,$pass, $confirm, $id_role);
        }
    }
    require('views/user/inscriptionView.php');
}

function isValidFields($email, $nom, $prenom, $tel,$pass, $confirm) {
    $errors = [] ;
    if (empty($email)) {
        $errors[] = "Le champ Email est requis.";
    }
    if (empty($nom)) {
        $errors[] = "Le champ Nom est requis.";
    }
    if (empty($prenom)) {
        $errors[] = "Le champ Prénom est requis.";
    }
    if (empty($tel)) {
        $errors[] = "Le champ Téléphone est requis.";
    }
    if (empty($pass)) {
        $errors[] = "Le champ Mot de passe est requis.";
    }
    if (empty($confirm)) {
        $errors[] = "Le champ Confirmation du mot de passe est requis.";
    }
    if (!empty($pass) && !empty($confirm) && $pass !== $confirm) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    return $errors;
}


function connexion() {
    require('views/user/connexionView.php');
}

?>