<?php
    include_once "Gui/Header.php";
?>
<div class="container">
    <div class="row">
        <?php
        foreach ($reservations as $reservation) {
            echo '<div class="col-12 col-md-6 col-lg-3 border p-4">';
                echo '<p> Customer: '.$reservation->GetCustomerData()->name.'</p>';
                echo '<p> Email: '.$reservation->GetCustomerData()->email.'</p>';
                echo '<p> Start date: '.date("d/m/Y", strtotime($reservation->reservationStartDate)).'</p>';
                echo '<p> End date: '.date("d/m/Y", strtotime($reservation->reservationEndDate)).'</p>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php
include_once "Gui/Footer.php";