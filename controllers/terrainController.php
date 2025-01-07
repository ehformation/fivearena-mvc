<?php 
function terrainsPage(){
    $terrains = getTerrains(-1);
    require('views/terrainView.php');
}
function terrainDetailPage($id) {
    $terrain = getTerrainById($id);
    require('views/terrainDetailView.php');
}

function adminAddTerrain(){
    if(isset($_POST["bouton"])){
        $nom            = $_POST["nom"];
        $description    = $_POST["description"];
        $surface        = $_POST["surface"];
        $options        = $_POST["options"];
        $adresse        = $_POST["adresse"];
        $prix           = $_POST["prix"];

        $errors     = [];

        if(count($errors) == 0){
            addTerrain($nom, $description, $surface, $options,$adresse, $prix);
        }
    }
    require('views/admin/adminAddTerrainView.php');
}

function adminListTerrain() {
    $terrains = getTerrains(-1);
    require('views/admin/adminListTerrainView.php');
}