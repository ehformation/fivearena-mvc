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
                    <!-- Exercice : Afficher TOUTE les reservation -->
                    <?php foreach($bookings as $booking) : ?>
                        <tr>
                            <td><?php echo $booking['id'] ?></td>
                            <td><?php echo $booking['user_nom'] ?> <?php echo $booking['user_prenom'] ?></td>
                            <td><?php echo $booking['terrain_nom'] ?></td>
                            <td><?php echo date( 'd/m/Y H:i:s', strtotime($booking['dateheure']) ) ?> - <?php echo date( 'd/m/Y H:i:s', strtotime($booking['dateheure'] . '+1 hour') ) ?></td>
                            <td><?php echo improveDisplayStatus($booking['status']) ?></td>
                            <td></td>
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