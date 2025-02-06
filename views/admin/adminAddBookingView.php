<?php ob_start(); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <?php include './views/layout/menu-dashboard.php'; ?>
        </div>
        <div class="col-8 ">
            <h3 class="mb-30">Ajouter une reservation</h3>
            <?php 
                if (isset($errors) && count($errors) > 0) {
                    echo "<div style='background:#ff000017;padding:10px'>";
                    foreach ($errors as $error) {
                        echo "<p style='color:red;'>$error</p>";
                    }
                    echo "</div>";
                }
            ?>
            <form action="index.php?p=admin-add-booking" method="post" class="form">
                <div>
                    <label for="terrain">Terrains <span class="red">*</span></label>
                    <select name="terrain_id" id="terrain">
                        <?php foreach($terrains as $terrain) :  ?>
                            <option value="<?php echo $terrain['id'] ?>"><?php echo $terrain['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="user">Utilisateur <span class="red">*</span></label>
                    <select name="user_id" id="user">
                        <?php foreach($users as $user) :  ?>
                            <option value="<?php echo $user['id'] ?>">
                                <?php echo $user['nom'] ?> <?php echo $user['prenom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="dateresa">Date <span class="red">*</span></label>
                    <input type="datetime-local" name="dateresa" id="dateresa">
                </div>
                
                <input type="submit" name="bouton" value="Reserver" class="btn btn-yellow full">
            </form>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean(); 
    $title = "Dashboard";
    require('./views/layout/template.php');
?>