<?php

//Makes sure there's only one connection to the database open at a time
function OpenCon()
{
   global $conn;
   if (!empty($conn)){
      return $conn;
   }

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $db = "hotel";
   $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
   $conn->set_charset('utf8');

   return $conn;
}
 
function CloseCon()
{
   global $conn;
    $conn -> close();
}