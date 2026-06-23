<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'koneksi.php';
include 'header.php';

$message = "";

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn,
        "SELECT * FROM users
        WHERE email='$email'"
    );

    if(mysqli_num_rows($query) > 0){

        $user = mysqli_fetch_assoc($query);

        if($password === $user['password']){

            $_SESSION['id_users'] = $user['id_users'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] == 'admin'){
                header("Location: admin/dashboard.php");
            }else{
                header("Location: home.php");
            }

            exit;

        }else{
            $message = "Password salah!";
        }

    }else{
        $message = "Email tidak ditemukan!";
    }

}
?>

<link rel="stylesheet" href="css/login.css">
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<div class="container">

<h2 align="center">Login</h2><br>

<p><?php echo $message; ?></p>

<form method="POST">
    
    <input type="text" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="login">
        Login
    </button>

</form><br><br>

<p align="center">
    Belum punya akun?
    <a href="pendaftaran.php">Daftar</a>
</p>

</body>
</html>