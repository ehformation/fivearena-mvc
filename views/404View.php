<?php ob_start(); ?>
<div class="container">
    <h1>Erreur 404</h1>
    <p>La page est introuvable. <a href="index.php">Retour à l'accueil</a>. Sinon jeter un oeil à <a href="index.php?p=nos-terrains">nos terrains</a> </p>
</div>

<?php
    $content = ob_get_clean(); 
    $title = "Accueil";
    require('./views/layout/template.php');
?>