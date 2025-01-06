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
