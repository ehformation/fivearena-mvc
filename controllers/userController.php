<?php 
require('models/userModels.php');
function inscriptionPage() {
    if(isset($_POST["bouton"])){
        $email      = $_POST["email"];
        $nom        = $_POST["nom"];
        $prenom     = $_POST["prenom"];
        $tel        = $_POST["tel"];
        $pass       = $_POST["pass"];
        $confirm    = $_POST["confirm"];
        $id_role    = 2;
        $errors     = [];

        $errors = isValidFields($email, $nom, $prenom, $tel,$pass, $confirm);

        if(count($errors) == 0){
            userRegister($email, $nom, $prenom, $tel,$pass, $confirm, $id_role);
        }
    }
    require('views/user/inscriptionView.php');
}
/**
 * Gère le processus de connexion d'un utilisateur.
 * 
 * Cette fonction récupère les données du formulaire de connexion (email et mot de passe),
 * vérifie si un utilisateur correspondant existe en base de données.
 * 
 * - Si l'utilisateur existe :
 *   - Redirige l'utilisateur vers le tableau de bord s'il est administrateur.
 *   - Redirige l'utilisateur vers la page d'accueil s'il n'est pas administrateur.
 * - Si l'utilisateur n'existe pas, relance le processus de connexion (par exemple, avec un message d'erreur).
 */
function connect(){
        
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $errors = [];
    
    if($user = getUserIfExist($email, $pass)) {
        $_SESSION["user"] = $user;
        if(isAdmin($email)){
            header("Location: index.php?p=dashboard");
        }else{
            header("Location: index.php?p=accueil");
        }
    }else{
        $errors[] = "Identifiant ou mot de passe incorrect";
        require('views/user/connexionView.php');
    }
    
    
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


function connexionPage() {
    if(!isLoggedIn()){
        require('views/user/connexionView.php');
    }else{
        header("Location: index.php?p=accueil");
    }
}

function isLoggedIn() {
    if(!empty($_SESSION['user'])) {
        return true;
    }else{
        return false;
    }
}

?>