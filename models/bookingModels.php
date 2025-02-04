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

function isCancellableBooking($booking_id) {
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('SELECT COUNT(*) AS count FROM reservation WHERE id = :id AND dateheure > DATE_ADD(NOW() , INTERVAL 48 HOUR)');
    $pdoStatement->bindValue(':id', $booking_id, PDO::PARAM_INT);

    $pdoStatement->execute();
    $isCancellable = $pdoStatement->fetch();

    return $isCancellable['count'] > 0;
}

function getBookingByUserId($user_id) {
    $pdo = dbConnect();

    $pdoStatement = $pdo->prepare('SELECT r.id, r.dateheure, r.status, t.nom AS terrain_nom, t.adresse AS           terrain_adresse 
    FROM reservation r 
    INNER JOIN terrain t ON r.id_terrain = t.id 
    WHERE r.id_user = :id_user 
    AND r.dateheure > NOW()
    ORDER BY r.dateheure DESC');

    $pdoStatement->bindValue(':id_user', $user_id, PDO::PARAM_INT);
    $pdoStatement->execute();

    $reservations = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $reservations;
}

function getBookings() {
    $pdo = dbConnect();

    $pdoStatement = $pdo->prepare('SELECT r.id, r.dateheure, r.status, t.nom AS terrain_nom, u.nom as user_nom, u.prenom as user_prenom 
    FROM reservation r 
    INNER JOIN terrain t ON r.id_terrain = t.id
    INNER JOIN user u ON r.id_user = u.id
    AND r.dateheure > NOW()
    ORDER BY r.dateheure DESC');
    $pdoStatement->execute();

    $reservations = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $reservations;
}