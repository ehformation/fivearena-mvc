<?php 


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

function userUpdate($nom, $prenom, $tel, $id) {
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('UPDATE user SET nom = :nom, prenom = :prenom, tel = :tel WHERE id = :id');

    $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $pdoStatement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $pdoStatement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $pdoStatement->bindParam(':tel', $tel, PDO::PARAM_STR);

    $pdoStatement->execute();
}

function userAdminUpdate($email, $nom, $prenom, $tel, $pass, $user_id) {
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('UPDATE user SET nom = :nom, prenom = :prenom, tel = :tel, email = :email, pass = :pass WHERE id = :user_id');

    $pdoStatement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $pdoStatement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $pdoStatement->bindParam(':tel', $tel, PDO::PARAM_STR);
    $pdoStatement->bindParam(':email', $email, PDO::PARAM_STR);
    $hashPassword = password_hash($pass, PASSWORD_BCRYPT);
    $pdoStatement->bindParam(':pass', $hashPassword, PDO::PARAM_STR);
    $pdoStatement->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    $pdoStatement->execute();
}

/**
 * Cette fonction retourne l'utilisateur. Si l'utilisateur n'est pas trouve dans la BDD on retourne false
 */
function getUserIfExist($email, $pass) {
    $pdo = dbConnect();
    $access = true;
    $pdoStatement = $pdo->prepare('SELECT * FROM user where email=:email');
    $pdoStatement->bindParam(':email', $email, PDO::PARAM_STR);
    $pdoStatement->execute();
    $user =  $pdoStatement->fetch();
    if (!$user) {
        $access = false;
    } else {
        if (empty($pass)) {
            $access = false;
        } else {
            $verified_pass = password_verify($pass, $user['pass']);
            if (!$verified_pass) {
                $access = false;
            }
        }
    }

    return $access ? $user : false;
}

function getUserById($id){
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('SELECT * FROM user where id=:id');
    $pdoStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $pdoStatement->execute();
    $user =  $pdoStatement->fetch();

    return $user;

}

function isAdmin($email) {
    $pdo = dbConnect();
    $id_role = 1;

    $pdoStatement = $pdo->prepare('SELECT * FROM user WHERE email=:email AND id_role = :id_role');
    $pdoStatement->bindParam(':email', $email, PDO::PARAM_STR);
    $pdoStatement->bindParam(':id_role', $id_role, PDO::PARAM_INT);
    $pdoStatement->execute();
    $user =  $pdoStatement->fetch();
    
    if($user) {
        if($user['id_role'] == 1) {
            return true;
        }
    }
    
    return false;
}

function getUsers(){
    $pdo = dbConnect();
    $pdoStatement = $pdo->prepare('SELECT * FROM user');
    $pdoStatement->execute();
    $users = $pdoStatement->fetchAll();
    
    return $users;
}
?>