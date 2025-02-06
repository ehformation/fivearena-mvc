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

        $errors = isValidFields([$email, $nom, $prenom, $tel, $pass, $confirm], 
                                ['Email', 'Nom', 'Prénom', 'Téléphone', 'Mot de passe', 'Confirmation du mot de passe']);

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

function isValidFields($fields, $labels) {
    $errors = [] ;

    foreach ($fields as $key => $field ){
        if(empty($field)){
            $errors[] = "Le champs " . $labels[$key] . " est requis";
        }
    }

    $passwordKey = array_search('Mot de passe', $labels);
    $confirmPasswordKey = array_search('Confirmation du mot de passe', $labels);

    if(!empty($passwordKey) && !empty($confirmPasswordKey) && $fields[$passwordKey] != $fields[$confirmPasswordKey]){
        $errors[] = "Les mots de passe ne correspondent pas.";
    }
    return $errors;
}


function connexionPage() {
    if(!isLoggedIn()){
        require('views/user/connexionView.php');
    }else{
        header("Location: index.php?p=account");
    }
}

function isLoggedIn() {
    if(!empty($_SESSION['user'])) {
        return true;
    }else{
        return false;
    }
}

function accountPage(){
    if(!isLoggedIn()){
        header("Location: index.php?p=inscription");
    }else{
        $nom = $_SESSION['user']['nom'];
        $prenom = $_SESSION['user']['prenom'];
        require('views/user/accountView.php');
    }
}

function deconnexion(){
    if(isLoggedIn()){
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php');
    }
}

function updateAccount() {
    if(isLoggedIn()){
        $user = getUserById($_SESSION['user']['id']);
        if(isset($_POST['bouton'])){

            $nom        = $_POST["nom"];
            $prenom     = $_POST["prenom"];
            $tel        = $_POST["tel"];

            $errors = isValidFields([$nom, $prenom, $tel], ['Nom', 'Prénom', 'Téléphone']);

            if(count($errors) == 0){
                userUpdate($nom, $prenom, $tel, $_SESSION['user']['id']);
            }
        }
        require('views/user/accountUpdateView.php');
    }
}

function adminListUsers(){
    $users = getUsers();
    require('views/admin/adminListUsersView.php');
}

function adminAddUsers(){
    if(isset($_POST["bouton"])){
        $nom            = $_POST["nom"];
        $prenom         = $_POST["prenom"];
        $email          = $_POST["email"];
        $pass           = $_POST["pass"];
        $tel            = $_POST["tel"];

        $errors     = [];

        if(count($errors) == 0){
            userRegister($email, $nom, $prenom, $tel, $pass, $pass, 2);
        }
    }
    require('views/admin/adminAddUsersView.php');
}

function adminEditUsers(){
    if(isset($_GET['id'])){
        if(isset($_POST["bouton"])){
            $nom            = $_POST["nom"];
            $prenom         = $_POST["prenom"];
            $email          = $_POST["email"];
            $pass           = $_POST["pass"];
            $tel            = $_POST["tel"];
            $user_id        = $_GET['id'];
    
            $errors     = [];

            $errors = isValidFields([$nom, $prenom, $tel, $email, $pass], ['Nom', 'Prénom', 'Téléphone', 'Email', 'Mot de passe']);
    
            if(count($errors) == 0){
                userAdminUpdate($email, $nom, $prenom, $tel, $pass, $user_id);
            }
        }
        $user = getUserById($_GET['id']);
        require('views/admin/adminEditUsersView.php');
    }else{
        header("Location: index.php?p=404");
    }
}

?>