<?php
function addBooking($datetime, $terrain_id, $user_id) {
    $pdo = dbConnect();
    $status = 'en attente';
    $pdoStatement = $pdo->prepare('INSERT INTO reservation (dateheure, status, id_user, id_terrain) VALUES (:dateheure, :status, :id_user, :id_terrain)');

    $pdoStatement->bindParam(':dateheure', $datetime, PDO::PARAM_STR);
    $pdoStatement->bindParam(':status', $status, PDO::PARAM_STR);
    $pdoStatement->bindValue(':id_user', $user_id, PDO::PARAM_INT);
    $pdoStatement->bindValue(':id_terrain', $terrain_id, PDO::PARAM_INT);

    return $pdoStatement->execute();
}

function isBookingAvailable($datetime, $terrain_id){
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('SELECT dateheure FROM reservation WHERE id_terrain = :id_terrain');

    $pdoStatement->bindValue(':id_terrain', $terrain_id, PDO::PARAM_INT);

    $pdoStatement->execute();
    $reservations = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    $start = strtotime($datetime);
    $end = strtotime($datetime . ' +1 hour');

    foreach ($reservations as $reservation) {
        $bookStart = strtotime($reservation['dateheure']);
        $bookEnd = strtotime($reservation['dateheure'] . ' +1 hour');

        if (($start < $bookEnd) && ($end > $bookStart)) {
            return false;
        }
    }

    return true;
}
