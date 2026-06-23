<?php
include 'koneksi.php';

$message = "";

if(isset($_POST['register'])){

    $full_name   = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email       = mysqli_real_escape_string($conn, $_POST['email']);
    $address     = mysqli_real_escape_string($conn, $_POST['address']);
    $phone       = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $username    = mysqli_real_escape_string($conn, $_POST['username']);
    $password    = md5($_POST['password']);

    $check = mysqli_query($conn,
    "SELECT * FROM users
    WHERE username='$username'
    OR email='$email'");

    if(mysqli_num_rows($check) > 0){
        $message = "Username atau Email sudah digunakan!";
    }else{

        $query = "INSERT INTO users
        (full_name,email,address,phone_number,username,password)
        VALUES
        ('$full_name','$email','$address','$phone','$username','$password')";

        if(mysqli_query($conn,$query)){
            $message = "Pendaftaran berhasil!";
        }else{
            $message = "Pendaftaran gagal!";
        }
    }
}
?>
<?php include 'header.php'; ?>

<link rel="stylesheet" href="css/login.css">
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran</title>
</head>
<body>
<div class="container">
<h2 align="center">Pendaftaran</h2><br><br>

<p><?php echo $message; ?></p>

<form method="POST">

    <input type="text"
    name="full_name"
    placeholder="Nama Lengkap"
    required><br><br>

    <input type="email"
    name="email"
    placeholder="Email"
    required><br><br>

    <input type="text"
    name="address"
    placeholder="Alamat"
    required><br><br>

    <input type="text"
    name="phone_number"
    placeholder="Nomor HP"
    required><br><br>


    <input type="text"
    name="username"
    placeholder="Username"
    required><br><br>

    <input type="password"
    name="password"
    placeholder="Password"
    required><br><br>

    <button type="submit" name="register">
        Daftar
    </button>

</form>
<br><br>
<p align="center">
    Sudah punya akun?
    <a href="login.php">Login</a>
</p>

</body>
</html>