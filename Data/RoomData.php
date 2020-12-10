<?php
include_once "Data/AdditionData.php";
class RoomData{
    public $roomNumber;
    public $basePrice;
    public $addition;

    public function GetAdditions(){

        $sql = "SELECT * FROM addition a JOIN room_addition ra ON a.addition_id=ra.addition_id WHERE room_number = $this->roomNumber"; //Add a join
        $result = OpenCon()->query($sql);

        if ($result->num_rows > 0){
            //outputs city from postal code row
            $additions = array();
            while($row = $result->fetch_assoc()) {
                $addition = new AdditionData;
                $addition->type = $row['type'];
                $addition->price = $row['price'];
                $additions[] = $addition;
            }
            $this->addition = $additions;
            return $additions;
        } else{
            return false;
        }
    }

    public function GetPrice(){
        $price = $this->basePrice;
        if (!$this->GetAdditions()){
            return $price;
        } else {
            foreach($this->GetAdditions() as $addition){
                $price += $addition->price;
            }
        }
        return $price;
    }

    public static function GetRooms(){

        $sql = "SELECT * FROM room";
        $result = OpenCon()->query($sql);

        if ($result->num_rows > 0){
            //outputs city from postal code row
            $rooms = array();
            while($row = $result->fetch_assoc()) {
                $room = new RoomData;
                $room->roomNumber = $row['room_number'];
                $room->basePrice = $row['price'];
                $rooms[] = $room;
            }
            return $rooms;
        } else{
            return false;
        }
    }
}