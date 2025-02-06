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

function adminEditTerrain(){
    if(isset($_GET['id'])){
        if(isset($_POST["bouton"])){
            $nom            = $_POST["nom"];
            $description    = $_POST["description"];
            $surface        = $_POST["surface"];
            $options        = $_POST["options"];
            $adresse        = $_POST["adresse"];
            $prix           = $_POST["prix"];
            $terrain_id     = $_GET["id"];
    
            $errors     = [];
    
            if(count($errors) == 0){
                updateTerrain($nom, $description, $surface, $options, $adresse, $prix, $terrain_id);
            }
        }
        $terrain = getTerrainById($_GET['id']);
        require('views/admin/adminEditTerrainView.php');
    }
}
function adminDeleteTerrain() {
    if(isset($_GET['id'])){
        if(deteleTerrain($_GET['id'])){
           header("Location: index.php?p=admin-list-terrain"); 
        }
    }
}
function adminListTerrain() {
    $terrains = getTerrains(-1);
    require('views/admin/adminListTerrainView.php');
}