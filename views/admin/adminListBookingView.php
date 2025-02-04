<?php ob_start(); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <?php include './views/layout/menu-dashboard.php'; ?>
        </div>
        <div class="col-8 ">
            <h3 class="mb-30">Liste des reservation</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom & Prénom</th>
                        <th>Terain</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
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