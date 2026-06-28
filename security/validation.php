<?php

function validEmail($email){

    return filter_var($email,FILTER_VALIDATE_EMAIL);

}

function validPhone($phone){

    return preg_match("/^[0-9]{10,15}$/",$phone);

}

function validPassword($password){

    return strlen($password)>=8;

}