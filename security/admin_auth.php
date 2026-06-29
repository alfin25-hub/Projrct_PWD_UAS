<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['id_users'])){

    header("Location: ../login.php");
    exit;

}

if($_SESSION['role'] != "admin"){

    header("Location: ../home.php");
    exit;

}