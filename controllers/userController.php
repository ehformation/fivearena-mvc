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

        userRegister($email, $nom, $prenom, $tel,$pass, $confirm, $id_role);
    }
    require('views/user/inscriptionView.php');
}
function connexion() {
    require('views/user/connexionView.php');
}

?>