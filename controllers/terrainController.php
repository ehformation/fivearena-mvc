<?php 
function terrainsPage(){
    $terrains = getTerrains(-1);
    require('views/terrainView.php');
}