<?php 
/*
   Attention : la valeur de l'URL dépend de comment vous avez configuré votre projet localement.
   - Le port '8888' fait référence au port utilisé par votre serveur local (par exemple, MAMP, XAMPP ou un autre serveur local).
   - 'fivearena-mvc' correspond au nom du dossier où vous avez placé votre projet sur votre serveur local.
   Si vous changez de port ou de dossier, vous devrez ajuster cette URL. Par exemple :
   - Si vous utilisez le port '8080' à la place de '8888', l'URL devient : 'http://localhost:8080/fivearena-mvc/'.
   - Si vous renommez le dossier en 'monprojet', l'URL devient : 'http://localhost:8888/monprojet/'.
*/
define('URL_ASSETS','http://localhost:8888/fivearena-mvc/assets/'); 
require('controllers/userController.php');
//http://localhost:8888/fivearena/?p=inscription
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