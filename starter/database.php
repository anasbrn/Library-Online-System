<?php

    $serverName = "localhost" ;
    $serverUser = "root" ;
    $serverPassword = "" ;
    $dbName = "library" ;

    $connection = mysqli_connect($serverName, $serverUser, $serverPassword, $dbName) ;

    if(!$connection){
        echo "Connection is failed!".mysqli_connect_errno();
    }