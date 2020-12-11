<?php
    include_once "Gui/Header.php";
?>
<div class="container">
    <div class="row">
        <?php
        foreach ($rooms as $room) {
            echo '<div class="col-12 col-md-6 col-lg-3 border p-4">';
                echo '<p> room: '.$room->roomNumber.'</p>';
                echo '<p> price: '.$room->GetPrice().' DKK per night</p>';
                echo '<p>
                    <a class="btn btn-info" data-toggle="collapse" data-target="#room'.$room->roomNumber.'">See additions</a>
                    <a href="/room/book/'.$room->roomNumber.'" class="btn btn-primary">Book now</a></p>';
                $additions = $room->GetAdditions();
                if($additions) {
                    echo '<div id="room'.$room->roomNumber.'" class="collapse">';
                        foreach($additions as $addition) {
                            echo $addition->type.'<br/>';
                        }
                    echo '</div>';
                }
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php
include_once "Gui/Footer.php";