<?php
include_once "Data/CustomerData.php";
class ReservationData{
    public $reservationID;
    public $cusID;
    public $room;
    public $reservationStartDate;
    public $reservationEndDate;
    public $isCleaned = 0;

    public function __construct($dbvalues = array()) {
        if(!empty($dbvalues)) {
            $this->reservationID = $dbvalues['reservation_id'];
            $this->cusID = $dbvalues['cus_id'];
            $this->room = $dbvalues['room_number'];
            $this->reservationStartDate = $dbvalues['start_date'];
            $this->reservationEndDate = $dbvalues['end_date'];
            $this->isCleaned = $dbvalues['is_cleaned'];
        }
    }

    public function CreateReservation(){
        $mysqli = OpenCon();
        $room = $mysqli->real_escape_string($this->room);
        $reservationStartDate = $mysqli->real_escape_string($this->reservationStartDate);
        $reservationEndDate = $mysqli->real_escape_string($this->reservationEndDate);
        $cleaned = $mysqli->real_escape_string($this->isCleaned);

        if (!empty($this->reservationID)){
            $sql = "UPDATE reservation SET `cus_id` = '$this->cusID', `room_number` = '$room', `start_date` = '$reservationStartDate', `end_date` = '$reservationEndDate', `is_cleaned` = '$cleaned' WHERE `reservation_id` = '$this->reservationID'"; //UPDATE `table` SET `col1` = '', `col2` = '' WHERE id = '...'
        } else{
            $sql = "INSERT INTO reservation VALUES (NULL, '$this->cusID', '$room', '$reservationStartDate', '$reservationEndDate', '$cleaned')";
        }
        $mysqli->query($sql) or die($mysqli->error);
    }

    public static function ReadReservationData(){

        $sql = "SELECT * FROM reservation 
        WHERE end_date > NOW()
        ORDER BY `start_date` ASC";
        $result = OpenCon()->query($sql);

        if ($result->num_rows > 0){
            $reservations = array();
            while($row = $result->fetch_assoc()) {
                $reservation = new ReservationData($row);
                $reservations[] = $reservation;
            }
            return $reservations;
        } else{
            return false;
        }
    }
    public static function RoomsForCleanup(){

        $sql = "SELECT * 
            FROM room r 
            JOIN reservation res 
            ON r.room_number=res.room_number 
            WHERE res.is_cleaned = 0 AND `end_date` < NOW()
            ORDER BY `end_date` ASC";
        $result = OpenCon()->query($sql) or die(OpenCon()->error);

        if ($result->num_rows > 0){
            
            $rooms = array();
            while($row = $result->fetch_assoc()) {
                $room = new ReservationData($row);
                $rooms[] = $room;
            }
            return $rooms;
        } else{
            return false;
        }
    }


    public static function GetReservationByID($id){

        $mysqli = OpenCon();
        $id = $mysqli->real_escape_string($id);
        $sql = "SELECT * FROM reservation WHERE reservation_id = '$id'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $reservation = new ReservationData($row);
            return $reservation;
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