<?php
    include_once "Gui/Header.php";
?>
<div class="container">
    <div class="row">
        <?php
        if (!empty($cleanups)) {
            foreach ($cleanups as $cleanup) {
                echo '<div class="col-12 col-md-6 col-lg-3 border p-4 room'.$cleanup->reservationID.'">';
                    echo '<p> Room number: '.$cleanup->room.'</p>';
                    echo '<p> End date: '.date("d/m/Y", strtotime($cleanup->reservationEndDate)).'</p>';
                    echo '<input type="submit" reservation="'.$cleanup->reservationID.'" class="btn btn-primary cleanup" value="Cleaned" />';
                echo '</div>';
            }
        } else {
            echo '<p> There is no rooms to show </p>';
        }
        ?>
    </div>
</div>

<?php
include_once "Gui/Footer.php";