<?php ob_start(); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <?php include './views/layout/menu-dashboard.php'; ?>
        </div>
        <div class="col-8 ">
            <h3 class="mb-30">Liste des utilisateurs</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Tel</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user) :  ?>
                        <tr>
                            <td><?php echo $user["id"]; ?></td>
                            <td><?php echo $user["email"]; ?></td>
                            <td><?php echo $user["nom"]; ?></td>
                            <td><?php echo $user["prenom"]; ?></td>
                            <td><?php echo $user["tel"]; ?></td>
                            <td><a href="index.php?p=admin-edit-users&id=<?php echo $user["id"]; ?>">Modifier</a></td>
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