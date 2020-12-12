<?php
include_once "Data/ReservationData.php";
    class CleanupManager extends Manager {
        public function __construct() {
            $this->RequireLogin();
        }

        public function All() {
            $cleanups = ReservationData::RoomsForCleanup();
            include_once "Gui/Cleanup.php";
        }

        public function Room($id){
            $reservation = ReservationData::GetReservationByID($id);
            $reservation->isCleaned = true;
            $reservation->CreateReservation();
        }
    }