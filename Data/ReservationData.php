<?php
include_once "Data/CustomerData.php";
class ReservationData{
    public $reservationID;
    public $cusID;
    public $room;
    public $reservationStartDate;
    public $reservationEndDate;

    public function CreateReservation(){
        $mysqli = OpenCon();
        $room = $mysqli->real_escape_string($this->room);
        $reservationStartDate = $mysqli->real_escape_string($this->reservationStartDate);
        $reservationEndDate = $mysqli->real_escape_string($this->reservationEndDate);

        $sql = "INSERT INTO reservation VALUES (NULL, '$this->cusID', '$room', '$reservationStartDate', '$reservationEndDate')";
        $mysqli->query($sql) or die($mysqli->error);
    }

    public static function ReadReservationData(){

        $sql = "SELECT * FROM reservation ORDER BY `start_date` ASC";
        $result = OpenCon()->query($sql);

        if ($result->num_rows > 0){
            //outputs city from postal code row
            $reservations = array();
            while($row = $result->fetch_assoc()) {
                $reservation = new ReservationData;
                $reservation->reservationID = $row['reservation_id'];
                $reservation->cusID = $row['cus_id'];
                $reservation->room = $row['room_number'];
                $reservation->reservationStartDate = $row['start_date'];
                $reservation->reservationEndDate = $row['end_date'];
                $reservations[] = $reservation;
            }
            return $reservations;
        } else{
            return false;
        }
    }

    public function GetCustomerData(){
        $customer = CustomerData::ReadCustomerData($this->cusID);
        return $customer;
    }

    public function DeleteReservationData(){
        $mysqli = OpenCon();

        $sql = "DELETE FROM reservation WHERE reservation_id = '$this->reservationID'";
        $mysqli->query(sql);
    }
}