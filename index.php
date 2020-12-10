<title>Landlyst</title>
<?php

    include 'db_connection.php';
    $logic = "Room";
    $view = "ShowRooms";

    include_once "Logic/".$logic."Logic.php";
    $logic = ucfirst($logic) . "Manager";
    $processor = new $logic;
    $processor -> $view();