<?php ob_start(); ?>
 <h1>Dashboard</h1>

<?php
    $content = ob_get_clean(); 
    $title = "Dashboard";
    require('./views/layout/template.php');
?>