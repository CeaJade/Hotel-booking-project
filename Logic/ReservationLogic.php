<?php
include_once "Data/ReservationData.php";
    class ReservationManager extends Manager {
        public function __construct() {
            $this->requireLogin();
        }

        public function all() {
            $reservations = ReservationData::ReadReservationData();
            include_once "Gui/Reservation.php";
        }
    }