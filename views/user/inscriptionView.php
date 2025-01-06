<?php ob_start(); //Commence l'enregistrement  ?>
<div id="search-terrain" class="cadre col-12">
    <h2 class=" mb-30 jc-center center">Inscription</h2>
    
    <form action="index.php?p=inscription" class="form col-4 m-auto" method="post">
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
            <label for="nom">Nom <span class="red">*</span></label>
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" class="full">
        </div>
        <div>
            <label for="prenom">Prenom <span class="red">*</span></label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom" class="full">
        </div>
        <div>
            <label for="tel">Tel <span class="red">*</span></label>
            <input type="tel" id="tel" name="tel" placeholder="Entrez votre tel" class="full">
        </div>
        <div>
            <label for="pass">Mot de passe <span class="red">*</span></label>
            <input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe" class="full">
        </div>
        <div>
            <label for="confirm-password">Confirmation de votre mot de passe <span class="red">*</span> </label>
            <input type="password" id="confirm-password" name="confirm" placeholder="Confirmer le mot de passe" class="full">
        </div>
        <input type="submit" name="bouton" value="Inscription" class="btn btn-yellow full">
    </form>
</div>

<?php
    $content = ob_get_clean(); //copie l'enregistrement dans la variable content
    $title = "Inscription";
    require('./views/layout/template.php');
?>