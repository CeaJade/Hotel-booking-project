<?php
class ReservationData{
    public $reservationID;
    public $cusID;
    public $room;
    public $reservationStartDate;
    public $reservationEndDate;

    public function CreateReservation(){
        $mysqli = OpenCon();
        $room = $mysqli->real_escape_string($room);
        $reservationStartDate = $mysqli->real_escape_string($reservationStartDate);
        $reservationEndDate = $mysqli->real_escape_string($reservationEndDate);

        $sql = "INSERT INTO customer VALUES ('$cusID', '$room', '$reservationStartDate', '$reservationEndDate')";
    }

    public function ReadReservationData(){

        $sql = "SELECT * FROM reservation";
        $result = OpenCon()->query($sql);

        if ($result->num_rows > 0){
            //outputs city from postal code row
            $reservations = array();
            while($row = $result->fetch_assoc()) {
                $reservation = new ReservationData;
                $reservation->reservationID = $row['reservation_id'];
                $reservation->cusID = $row['cus_id'];
                $reservation->reservationStartDate = $row['start_date'];
                $reservation->reservationEndDate = $row['end_date'];
                $reservations[] = $reservation;
            }
            return $rooms;
        } else{
            return false;
        }
    }

    public function DeleteReservationData(){
        $mysqli = OpenCon();

        $sql = "DELETE FROM reservation WHERE reservation_id = '$this->reservationID'";
        $mysqli->query(sql);
    }
}