<?php ob_start(); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <?php include './views/layout/menu-dashboard.php'; ?>
        </div>
        <div class="col-8 ">
            <h3 class="mb-30">Modifier</h3>
            <?php 
            if (isset($errors) && count($errors) > 0) {
                echo "<div style='background:#ff000017;padding:10px'>";
                foreach ($errors as $error) {
                    echo "<p style='color:red;'>$error</p>";
                }
                echo "</div>";
            }
            ?>
            <form action="index.php?p=admin-edit-users&id=<?php echo $user['id'] ?>" method="post" class="form">
                <div>
                    <label for="nom">Nom <span class="red">*</span></label>
                    <input type="text" id="nom" name="nom" value="<?php echo $user['nom'] ?>" placeholder="Ex: Petit" class="full">
                </div>
                <div>
                    <label for="prenom">Prénom <span class="red">*</span></label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom'] ?>" placeholder="Ex: Jean" class="full">
                </div>
                <div>
                    <label for="email">Email <span class="red">*</span></label>
                    <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>" placeholder="Ex: Jean" class="full">
                </div>
                <div>
                    <label for="pass">Mot de passe <span class="red">*</span></label>
                    <input type="password" id="pass" name="pass" class="full">
                </div>
                <div>
                    <label for="tel">Tel</label>
                    <input type="tel" id="tel" name="tel" value="<?php echo $user['tel'] ?>" class="full">
                </div>
                
                <input type="submit" name="bouton" value="modifier" class="btn btn-yellow full">
            </form>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean(); 
    $title = "Dashboard";
    require('./views/layout/template.php');
?>