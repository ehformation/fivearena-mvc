<?php
function improveDisplayStatus($status) {
    $htmlStatus = '';

    switch ($status) {
        case 'en attente':
            $htmlStatus = '<p class="badge badge-blue">' . $status . '</p>';
        break;
        
        case 'confirmé':
            $htmlStatus = '<p class="badge badge-green">' . $status . '</p>';
        break;

        case 'annulé':
            $htmlStatus = '<p class="badge badge-red">' . $status . '</p>';
        break;

        case 'en cours':
            $htmlStatus = '<p class="badge badge-orange">' . $status . '</p>';
        break;

        case 'terminé':
            $htmlStatus = '<p class="badge badge-grey">' . $status . '</p>';
        break;
    }

    return $htmlStatus;

}