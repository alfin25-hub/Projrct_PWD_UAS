<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$timeout = 43200; // 12 hours in seconds

if(isset($_SESSION['LAST_ACTIVITY'])){

    if(time() - $_SESSION['LAST_ACTIVITY'] > $timeout){

        session_unset();
        session_destroy();

        header("Location: login.php");
        exit;
    }
}

$_SESSION['LAST_ACTIVITY'] = time();
?>