<?php

    function datecalc($date){
        $currentDate = date("Y-m-d");
        $difference = strtotime($date) - strtotime($currentDate);
        return abs(round($difference/86400));
    }
    
    function updatestatus($id, $date){
        include "database.php";
        $unixDate = strtotime(date("Y-m-d"));
        $unixExpiryDate = strtotime($date);
        if($unixDate >= $unixExpiryDate){
            $sql = "UPDATE task SET status_ID = 3 WHERE ID_task = '$id'";
            $edit = mysqli_query($konekcija, $sql);
        }
    }