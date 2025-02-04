<?php ob_start(); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <?php include './views/layout/menu-dashboard.php'; ?>
        </div>
        <div class="col-8 ">
            <h3 class="mb-30">Ajouter un utilisateur</h3>
            <form action="index.php?p=admin-add-users" method="post" class="form">
                <div>
                    <label for="nom">Nom <span class="red">*</span></label>
                    <input type="text" id="nom" name="nom" placeholder="Ex: Petit" class="full">
                </div>
                <div>
                    <label for="prenom">Prénom <span class="red">*</span></label>
                    <input type="text" id="prenom" name="prenom" placeholder="Ex: Jean" class="full">
                </div>
                <div>
                    <label for="email">Email <span class="red">*</span></label>
                    <input type="email" id="email" name="email" placeholder="Ex: Jean" class="full">
                </div>
                <div>
                    <label for="pass">Mot de passe <span class="red">*</span></label>
                    <input type="password" id="pass" name="pass" class="full">
                </div>
                <div>
                    <label for="tel">Tel</label>
                    <input type="tel" id="tel" name="tel" class="full">
                </div>
                
                <input type="submit" name="bouton" value="Ajouter un utilisateur" class="btn btn-yellow full">
            </form>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean(); 
    $title = "Dashboard";
    require('./views/layout/template.php');
?>