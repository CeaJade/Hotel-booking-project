<?php
include_once "Data/RoomData.php";
include_once "Data/CustomerData.php";
include_once "Data/ReservationData.php";

class RoomManager extends Manager {

    public function ShowRooms(){
        $rooms = RoomData::GetRooms();
        include_once "Gui/Rooms.php";
    }

    public function Book($roomNumber) {
        $confirm = false;
        if(!empty($_POST)) {
            //Process data
            $customer = new CustomerData;
            $customer->name = $_POST['name'];
            $customer->address = $_POST['address'];
            $customer->email = $_POST['email'];
            $customer->phoneNumber = $_POST['phone'];
            $customer->postalcode = $_POST['postal'];
            $customer->StoreCustomerData();

            //Reservation!
            $reservation = new ReservationData;
            $reservation->cusID = $customer->cusID;
            $reservation->room = $roomNumber;
            $reservation->reservationStartDate = $_POST['startdate'];
            $reservation->reservationEndDate = $_POST['enddate'];
            $reservation->CreateReservation();
            $confirm = true;
        }
        $room = RoomData::GetRoom($roomNumber);
        include_once 'Gui/Book.php';
    }
}