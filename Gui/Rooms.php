<?php
foreach ($rooms as $room){
    echo '<div>';
    echo '<p> room: '.$room->roomNumber.'</p>';
    echo '<p> price: '.$room->GetPrice().' DKK per night</p>';
    echo '</div>';
}