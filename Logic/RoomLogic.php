<?php

include_once "Data/RoomData.php";
class RoomManager {

    public function ShowRooms(){
        $rooms = RoomData::GetRooms();
        include_once "Gui/Rooms.php";
    }
}