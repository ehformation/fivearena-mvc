<?php 
session_start();
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
require('models/dbModels.php');

require('helpers/helpers.php');

require('controllers/userController.php');
require('controllers/terrainController.php');
require('controllers/defaultController.php');
require('controllers/bookingController.php');

//http://localhost:8888/fivearena/?p=inscription
 if(isset($_GET['p'])){

    switch ($_GET['p']) {
        case 'inscription':
            inscriptionPage();
        break;

        case 'connexion':
            //Si il a envoyé le formulaire !
            if(!empty($_POST['bouton'])){
                connect();
            }else{
                //Affiche le formulaire de connexion
                connexionPage();
            } 
        break;

        case 'dashboard': 
            dashboardPage();
        break;

        case 'nos-terrains': 
            terrainsPage();
        break;
        
        case 'terrain': 
            if(isset($_GET['id'])){
                terrainDetailPage($_GET['id']);
            }else{
                page404();
            }
        break;

        case 'booking': 
            if(isset($_GET['id'])){
                booking($_GET['id']);
            }else{
                page404();
            }
        break;

        case 'accueil': 
            accueilPage();
        break;

        case 'contact': 
            contactPage();
        break;
        
        case 'account': 
            accountPage();
        break;

        case 'update-account': 
            updateAccount();
        break;

        case 'my-booking': 
            myBooking();
        break;
        
        case 'deconnexion': 
            deconnexion();
        break;

        case 'admin-add-terrain': 
            adminAddTerrain();
        break;

        case 'admin-edit-terrain': 
            adminEditTerrain();
        break;

        case 'admin-list-terrain': 
            adminListTerrain();
        break;

        case 'admin-add-users': 
            adminAddUsers();
        break;

        case 'admin-edit-users': 
            adminEditUsers();
        break;

        case 'admin-list-users': 
            adminListUsers();
        break;

        case 'admin-add-booking': 
            adminAddBooking();
        break;

        case 'admin-list-booking': 
            adminListBooking();
        break;
        
        default:
            page404();
        break;
    }

 }else{
    accueilPage();
 }

?>