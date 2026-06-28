<?php

function loginHistory($conn,$id_users){

$ip=$_SERVER['REMOTE_ADDR'];

$browser=$_SERVER['HTTP_USER_AGENT'];

$stmt=mysqli_prepare($conn,"
INSERT INTO login_history
(id_users,login_time,ip_address,browser)
VALUES(?,NOW(),?,?)");

mysqli_stmt_bind_param(
$stmt,
"iss",
$id_users,
$ip,
$browser
);

mysqli_stmt_execute($stmt);

}