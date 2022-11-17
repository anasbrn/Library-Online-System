<?php
    include 'scripts.php' ;

    session_start();
    unset($_SESSION['welcomeBack']);
    
    
    header('location: signIn.php');
    
    die();