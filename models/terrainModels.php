<?php 

function getTerrains($limit = 10) {
    $pdo = dbConnect();
    if($limit != -1){
        $pdoStatement = $pdo->prepare('SELECT * FROM terrain ORDER BY nom DESC LIMIT :limit');
        $pdoStatement->bindValue(':limit', $limit, PDO::PARAM_INT);
    }else{
        $pdoStatement = $pdo->prepare('SELECT * FROM terrain ORDER BY nom DESC');
    }
    
    $pdoStatement->execute();

    $terrains = $pdoStatement->fetchAll();
    if($terrains){
        return $terrains;
    }

    return false;
}

function getTerrainById($id) {
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('SELECT * FROM terrain WHERE id=:id');
    $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    
    $pdoStatement->execute();

    $terrain = $pdoStatement->fetch();
    if($terrain){
        return $terrain;
    }

    return false;
}
function addTerrain($nom, $description, $surface, $options, $adresse, $prix){

    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('INSERT INTO terrain (nom, description, surface, options, adresse, prix, image) VALUES (:nom, :description, :surface, :options, :adresse, :prix, :image)');

    $pdoStatement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $pdoStatement->bindParam(':description', $description, PDO::PARAM_STR);
    $pdoStatement->bindParam(':surface', $surface, PDO::PARAM_STR);
    $pdoStatement->bindParam(':options', $options, PDO::PARAM_STR);
    $pdoStatement->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $pdoStatement->bindValue(':prix', $prix, PDO::PARAM_STR);
    $pdoStatement->bindValue(':image', "terrain.png", PDO::PARAM_STR);

    return $pdoStatement->execute();
}

function updateTerrain($nom, $description, $surface, $options, $adresse, $prix, $terrain_id) {
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('UPDATE terrain SET nom = :nom, description = :description, adresse = :adresse, surface = :surface, options = :options, prix = :prix WHERE id = :terrain_id');

    $pdoStatement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $pdoStatement->bindParam(':description', $description, PDO::PARAM_STR);
    $pdoStatement->bindParam(':surface', $surface, PDO::PARAM_STR);
    $pdoStatement->bindParam(':options', $options, PDO::PARAM_STR);
    $pdoStatement->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $pdoStatement->bindValue(':prix', $prix, PDO::PARAM_STR);
    $pdoStatement->bindValue(':terrain_id', $terrain_id, PDO::PARAM_INT);

    $pdoStatement->execute();
}


function deteleTerrain($terrain_id) {
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('DELETE FROM terrain WHERE id = :terrain_id');

    $pdoStatement->bindValue(':terrain_id', $terrain_id, PDO::PARAM_INT);

    return $pdoStatement->execute();
}