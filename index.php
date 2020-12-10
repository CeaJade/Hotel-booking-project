<?php
    include 'db_connection.php';
    $logic = "Room";
    $view = "ShowRooms";

    include_once "Logic/".$logic.".php";
    $logic = ucfirst($logic) . "Manager";
    $processor = new $logic;
    $processor -> $view();