<?php
    include_once 'db_connection.php';
    include_once 'Logic/Default.php';
    
    $logic = 'Room';
    $action = 'ShowRooms';
    
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    if(strlen($uri)) {
        $uri = explode('/', $uri);
        $logic = array_shift($uri);
        $action = array_shift($uri);
    }
    
    $logic = ucfirst($logic);
    include_once 'Logic/'.$logic.'Logic.php';
    $logic = $logic.'Manager';
    $processor = new $logic; // Calling the class dynamically
    
    call_user_func_array(array($processor, $action), $uri); // Calling a method dynamically