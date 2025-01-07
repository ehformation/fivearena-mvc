<?php ob_start(); ?>
    <div class="container">
    <h1>Mon espace</h1>
    <h2>Bonjour <?php echo $nom . ' ' . $prenom ?></h2>

    <ul class="mt-30">
        <li><a class="btn btn-blue full mb-10" href="index.php?p=update-account">Modifier mon compte</a></li>
        <li><a class="btn btn-blue full  mb-10" href="index.php?p=my-booking">Mes réservations</a></li>
        <li><a class="btn btn-red full" href="index.php?p=deconnexion">Déconnexion</a></li>
    </ul>
    </div>
<?php
    $content = ob_get_clean(); 
    $title = "Mon espace";
    require('./views/layout/template.php');
?>