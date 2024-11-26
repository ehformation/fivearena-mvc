<?php ob_start(); ?>

<div id="search-terrain" class="cadre col-12">
    <h2 class=" mb-30 jc-center center">Connexion</h2>
    <form action="" class="form col-4 m-auto" method="post">
        <?php 
            if (isset($errors) && count($errors) > 0) {
                echo "<div style='background:#ff000017;padding:10px'>";
                foreach ($errors as $error) {
                    echo "<p style='color:red;'>$error</p>";
                }
                echo "</div>";
            }
        ?>
        <div>
            <label for="email">Email <span class="red">*</span></label>
            <input type="text" id="email" name="email" placeholder="Entrez votre email" class="full">
        </div>
        <div>
            <label for="pass">Mot de passe<span class="red">*</span></label>
            <input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe" class="full">
        </div>
        <input type="submit" name="bouton" value="Connexion" class="btn btn-yellow full">
    </form> 
</div>

<?php
    $content = ob_get_clean(); 
    $title = "Connexion";
    require('./views/layout/template.php');
?>