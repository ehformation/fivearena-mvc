<?php 
function dashboard() {
    if(!isLoggedIn()){
        header("Location: index.php?p=connexion");
    }else{
        require('views/user/dashboardView.php');
    }
}
function accueil() {
    require('views/accueilView.php');
}
?>