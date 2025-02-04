<?php 
require('models/terrainModels.php');

function dashboardPage() {
    if(!isLoggedIn()){
        header("Location: index.php?p=connexion");
    }else{
        if(!isAdmin($_SESSION['user']['email'])){
            header("Location: index.php?p=connexion");
        }else{
            require('views/user/dashboardView.php');
        }
    }
}
function accueilPage() {
    $terrains = getTerrains(4);
    require('views/accueilView.php');
}

function page404() {
    require('views/404View.php');
}

function contactPage() {
    require('views/contactView.php');
}
?>