<?php 
function terrainsPage(){
    $terrains = getTerrains(-1);
    require('views/terrainView.php');
}
function terrainDetailPage($id) {
    $terrain = getTerrainById($id);
    require('views/terrainDetailView.php');
}