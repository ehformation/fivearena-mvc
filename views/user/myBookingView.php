<?php ob_start(); ?>
    <div class="container">
    <h1>Mes réservations à venir</h1>
    <?php if(!empty($bookings)) : ?>
        <table class="table mt-30">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du terrain</th>
                    <th>Adresse du terrain</th>
                    <th>Statut</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($bookings as $booking) : ?>
                <tr>
                    <td><?php echo $booking['id'] ?></td>
                    <td><?php echo $booking['terrain_nom'] ?></td>
                    <td><?php echo $booking['terrain_adresse'] ?></td>
                    <td><?php echo improveDisplayStatus($booking['status']) ?></td>
                    <td><?php echo date( 'd/m/Y H:i:s', strtotime($booking['dateheure']) ) ?></td>
                    <td><?php echo date( 'd/m/Y H:i:s', strtotime($booking['dateheure'] . '+1 hour') ) ?></td>
                    <td>
                        <?php if(canCancelBooking($booking['id'])) : ?> 
                            <a href="" class="red">Annuler la réservation</a>
                        <?php else :  ?>
                            <p>Impossible d'annuler</p>
                        <?php endif; ?>    
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
    <?php else : ?>
        <p>Aucune réservation trouvée.</p>
    <?php endif; ?>
    </div>
<?php
    $content = ob_get_clean(); 
    $title = "Mes réservations";
    require('./views/layout/template.php');
?>