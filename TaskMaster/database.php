<?php
    
    $server = "localhost";
    $user = "root";
    $psw = "";
    $db = "tasks";

    $konekcija = new mysqli($server, $user, $psw, $db);

    if($konekcija->connect_error){
        die("error");
    }
