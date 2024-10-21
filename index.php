<?php 
define('URL','http://localhost:8888/fivearena/');
require('controllers/userController.php');
 //?p=inscription
 if(isset($_GET['p'])){

    switch ($_GET['p']) {
        case 'inscription':
                inscription();
            break;
        case 'connexion':
                connexion();
            break;
        
        default:
            
            break;
    }

 }else{
    echo "Aucun paramètre d'url défini";
 }

?>