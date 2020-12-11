<?php
    include_once 'db_connection.php';
    
    $logic = 'Room';
    $action = 'ShowRooms';
    
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    if(strlen($uri)) {
        $uri = explode('/', $uri);
        $logic = $uri[0];
        $action = $uri[1];
    }
    
    include_once 'Logic/'.$logic.'Logic.php';
    $logic = ucfirst($logic).'Manager';
    $processor = new $logic; // Calling the class dynamically
    $processor->$action(); // Calling a method dynamically