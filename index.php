<?php 
require('controllers/userController.php');
 //?p=inscription
 if(isset($_GET['p'])){

    switch ($_GET['p']) {
        case 'inscription':
                inscription();
            break;
        
        default:
            
            break;
    }

 }else{
    echo "Aucun paramètre d'url défini";
 }

?>