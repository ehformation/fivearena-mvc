<?php 
require('models/terrainModels.php');

function dashboard() {
    if(!isLoggedIn()){
        header("Location: index.php?p=connexion");
    }else{
        require('views/user/dashboardView.php');
    }
}
function accueil() {
    $terrains = getTerrains(4);
    require('views/accueilView.php');
}
?>