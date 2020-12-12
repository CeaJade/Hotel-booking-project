<?php
    include_once "Gui/Header.php";
?>
<div class="container">
    <?php
     if($confirm) {
        echo '<div class="alert alert-success">';
            echo 'Reservation completed';
        echo '</div>';
    }
    ?>
    <div class="row">
        <div class="col-12 col-md-3">
            <?php
                echo '<p>Room: '.$room->roomNumber.'</p>';
                echo '<p>';
                    foreach($room->GetAdditions() as $addition) {
                        echo $addition->type.'<br />';
                    }
                echo '</p>';
            ?>
        </div>
        <div class="col-12 col-md-9">
            <form method="post">
                <div class="form-group row">
                    <label class="col-4">Name</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Address</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="address" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Postal code</label>
                    <div class="col-8">
                        <input type="text" class="form-control postalcode" name="postal" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">City</label>
                    <div class="col-8">
                        <input type="text" class="form-control city" name="city" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Email address</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Phonenumber</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="phone" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Start date</label>
                    <div class="col-8">
                        <input type="date" class="form-control" name="startdate" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">End date</label>
                    <div class="col-8">
                        <input type="date" class="form-control" name="enddate" />
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Make reservation" />
            </form>
        </div>
    </div>
</div>

<?php
include_once "Gui/Footer.php";