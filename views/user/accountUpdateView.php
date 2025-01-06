<?php ob_start();  ?>
<div id="search-terrain" class="cadre col-12">
    <h2 class=" mb-30 jc-center center">Modifier mon compte</h2>
    
    <form action="index.php?p=update-account" class="form col-10 m-auto" method="post">
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
            <label for="nom">Nom <span class="red">*</span></label>
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" class="full" value="<?php echo $user['nom'] ?>">
        </div>
        <div>
            <label for="prenom">Prenom <span class="red">*</span></label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom" class="full" value="<?php echo $user['prenom'] ?>">
        </div>
        <div>
            <label for="tel">Tel <span class="red">*</span></label>
            <input type="tel" id="tel" name="tel" placeholder="Entrez votre tel" class="full" value="<?php echo $user['tel'] ?>">
        </div>
        <input type="submit" name="bouton" value="Modifier" class="btn btn-yellow full">
    </form>
</div>

<?php
    $content = ob_get_clean();
    $title = "Modifier mon compte";
    require('./views/layout/template.php');
?>