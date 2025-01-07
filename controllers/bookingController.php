<?php 
require('models/bookingModels.php');

function booking($terrain_id) {
    if(isLoggedIn()){
        if(isset($_POST['reserver'])){

            $user_id         = $_SESSION['user']['id'];
            $datetime        = $_POST["dateresa"];
            $errors          = [];

            if(isBookingAvailable($datetime, $terrain_id)){
                if(!addBooking($datetime, $terrain_id, $user_id)){
                    $errors[] = 'Erreur lors de la reservation du terrain';
                }
            }else{
                $errors[] = 'Le terrain est déjà reservé'; 
            }
            
        }
        $terrain = getTerrainById($terrain_id);
        require('views/terrainDetailView.php');
    }
}

function canCancelBooking($booking_id){
    return isCancellableBooking($booking_id);
}

function myBooking() {
    if(isLoggedIn()){
        $user_id = $_SESSION['user']['id'];
        $bookings = getBookingByUserId($user_id);
        require('views/user/myBookingView.php');
    }
}

