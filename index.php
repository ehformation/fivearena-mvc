<?php 
/*
   Attention : la constante 'URL_ASSETS' définit le chemin vers le dossier des ressources (assets) de votre projet.
   - 'http://localhost:8888/' correspond à votre serveur local.
   - 'fivearena-mvc' est le nom du dossier principal de votre projet.
   - 'assets/' est le sous-dossier où se trouvent les fichiers de ressources (images, CSS, JavaScript, etc.).
   
   Si vous changez le port (8888), le nom du dossier de votre projet ou le nom du dossier 'assets', vous devez également
   modifier cette URL. Par exemple :
   - Si le port devient '8080', l'URL sera : 'http://localhost:8080/fivearena-mvc/assets/'.
   - Si vous renommez le dossier en 'monprojet', l'URL devient : 'http://localhost:8888/monprojet/assets/'.
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