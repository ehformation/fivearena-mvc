<?php 
require('dbModels.php');

function userRegister($email, $nom, $prenom, $tel, $pass, $confirm, $id_role) {
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('INSERT INTO user (email, pass, nom, prenom, tel, id_role) VALUES (:email, :pass, :nom, :prenom, :tel, :id_role)');

    $pdoStatement->bindParam(':email', $email, PDO::PARAM_STR);
    $hashPassword = password_hash($pass, PASSWORD_BCRYPT);
    $pdoStatement->bindParam(':pass', $hashPassword, PDO::PARAM_STR);
    $pdoStatement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $pdoStatement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $pdoStatement->bindParam(':tel', $tel, PDO::PARAM_STR);
    $pdoStatement->bindValue(':id_role', 2, PDO::PARAM_INT);

    $pdoStatement->execute();
}

?>