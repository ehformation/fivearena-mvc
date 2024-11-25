<?php 

function getTerrains($limit = 10) {
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('SELECT * FROM terrain LIMIT :limit');
    $pdoStatement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $pdoStatement->execute();

    $terrains = $pdoStatement->fetchAll();
    if($terrains){
        return $terrains;
    }

    return false;
}