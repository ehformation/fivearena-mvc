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

function adminAddBooking(){
    if(isset($_POST['bouton'])){

        $user_id         = $_POST['user_id'];
        $terrain_id      = $_POST['terrain_id'];
        $datetime        = $_POST["dateresa"];

        if(isBookingAvailable($datetime, $terrain_id)){
            if(!addBooking($datetime, $terrain_id, $user_id)){
                $errors[] = 'Erreur lors de la reservation du terrain';
            }
        }else{
            $errors[] = 'Le terrain est déjà reservé'; 
        }
        
    }
    $terrains = getTerrains(-1);
    $users = getUsers();
    require('views/admin/adminAddBookingView.php');
}

function adminListBooking(){
    $bookings = getBookings();
    require('views/admin/adminListBookingView.php');
}
