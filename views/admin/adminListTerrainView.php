<?php ob_start(); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <?php include './views/layout/menu-dashboard.php'; ?>
        </div>
        <div class="col-8 ">
            <h3 class="mb-30">Liste des terrains</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Surface</th>
                        <th>Options</th>
                        <th>Adresse</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($terrains as $terrain) :  ?>
                        <tr>
                            <td><?php echo $terrain["id"]; ?></td>
                            <td><?php echo $terrain["nom"]; ?></td>
                            <td><?php echo $terrain["surface"]; ?></td>
                            <td><?php echo $terrain["options"]; ?></td>
                            <td><?php echo $terrain["adresse"]; ?></td>
                            <td><?php echo $terrain["prix"]; ?></td>
                            <td><a href="index.php?p=admin-edit-terrain&id=<?php echo $terrain["id"]; ?>">Modifier</a> <a href="index.php?p=admin-delete-terrain&id=<?php echo $terrain["id"]; ?>">Supprimer</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean(); 
    $title = "Dashboard";
    require('./views/layout/template.php');
?>