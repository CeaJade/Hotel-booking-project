<?php
include_once "Data/ReservationData.php";
    class ReservationManager extends Manager {
        public function __construct() {
            $this->RequireLogin();
        }

        public function All() {
            $reservations = ReservationData::ReadReservationData();
            include_once "Gui/Reservation.php";
        }
    }