<?php ob_start(); ?>
<div class="container">
    <h1>Contact</h1>
    
</div>
<?php
    $content = ob_get_clean(); 
    $title = "Accueil";
    require('./views/layout/template.php');
?>