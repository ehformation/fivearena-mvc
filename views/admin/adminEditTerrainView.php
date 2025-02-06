<?php ob_start(); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <?php include './views/layout/menu-dashboard.php'; ?>
        </div>
        <div class="col-8 ">
            <h3 class="mb-30">Modifier un terrain</h3>
            <?php 
            if (isset($errors) && count($errors) > 0) {
                echo "<div style='background:#ff000017;padding:10px'>";
                foreach ($errors as $error) {
                    echo "<p style='color:red;'>$error</p>";
                }
                echo "</div>";
            }
            ?>
            <form action="index.php?p=admin-edit-terrain&id=<?php echo $terrain['id'] ?>" method="post" class="form">
                <div>
                    <label for="nom">Nom <span class="red">*</span></label>
                    <input type="text" id="nom" name="nom" value="<?php echo $terrain['nom'] ?>" placeholder="Terrain champions" class="full">
                </div>
                <div>
                    <label for="description">Description <span class="red">*</span></label>
                    <textarea name="description" id="description" class="full"><?php echo $terrain['description'] ?></textarea>
                </div>
                <div>
                    <label for="surface">Surface <span class="red">*</span></label>
                    <select name="surface" id="surface" class="full">
                        <option value="pelouse" <?php echo ($terrain['surface'] == 'pelouse') ? 'selected' : '' ?>>Pelouse</option>
                        <option value="beton" <?php echo ($terrain['surface'] == 'beton') ? 'selected' : '' ?>>Béton</option>
                        <option value="sable" <?php echo ($terrain['surface'] == 'sable') ? 'selected' : '' ?>>Sable</option>
                        <option value="synthetique" <?php echo ($terrain['surface'] == 'synthetique') ? 'selected' : '' ?>>Synthetique</option>
                    </select>
                </div>
                <div>
                    <label for="options">Options <span class="red">*</span></label>
                    <input type="text" id="options" name="options" value="<?php echo $terrain['options'] ?>" placeholder="Vestiaires, Parking" class="full">
                </div>
                <div>
                    <label for="adresse">Adresse <span class="red">*</span></label>
                    <input type="text" id="adresse" name="adresse" value="<?php echo $terrain['adresse'] ?>" placeholder="123 rue du jardin" class="full">
                </div>
                <div>
                    <label for="prix">Prix / heure<span class="red">*</span></label>
                    <input type="text" id="prix" name="prix" value="<?php echo $terrain['prix'] ?>" placeholder="123" class="full">
                </div>
                <input type="submit" name="bouton" value="Modifer" class="btn btn-yellow full">
            </form>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean(); 
    $title = "Dashboard";
    require('./views/layout/template.php');
?>