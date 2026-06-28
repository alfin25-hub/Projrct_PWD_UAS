<?php
include 'koneksi.php';
include "security/security.php";
include "security/csrf.php";
include "security/validation.php";

$message = "";

if(isset($_POST['register'])){

    // ==========================
    // Validasi CSRF
    // ==========================
    if(
        !isset($_POST['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ){
        die("CSRF Token tidak valid!");
    }

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone_number']);
    $username = trim($_POST['username']);
    $password_input = $_POST['password'];

    // ==========================
    // Validasi Input
    // ==========================
    if(!validEmail($email)){

        $message = "Format email tidak valid.";

    }elseif(!validPhone($phone)){

        $message = "Nomor HP tidak valid.";

    }elseif(!validPassword($password_input)){

        $message = "Password minimal 8 karakter.";

    }else{

        $password = password_hash($password_input, PASSWORD_DEFAULT);

        // ==========================
        // Cek Username & Email
        // ==========================
        $check = mysqli_prepare(
            $conn,
            "SELECT id_users
             FROM users
             WHERE username=? OR email=?"
        );

        mysqli_stmt_bind_param(
            $check,
            "ss",
            $username,
            $email
        );

        mysqli_stmt_execute($check);

        $result = mysqli_stmt_get_result($check);

        if(mysqli_num_rows($result) > 0){

            $message = "Username atau Email sudah digunakan!";

        }else{

            // ==========================
            // Simpan Data
            // ==========================
            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO users
                (full_name,email,address,phone_number,username,password)
                VALUES(?,?,?,?,?,?)"
            );

            mysqli_stmt_bind_param(
                $stmt,
                "ssssss",
                $full_name,
                $email,
                $address,
                $phone,
                $username,
                $password
            );

            if(mysqli_stmt_execute($stmt)){

                $message = "Pendaftaran berhasil!";

            }else{

                $message = "Pendaftaran gagal!";

            }

            mysqli_stmt_close($stmt);
        }

        mysqli_stmt_close($check);
    }
}
?>

<?php include 'header.php'; ?>

<link rel="stylesheet" href="css/login.css">

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pendaftaran</title>
</head>

<body>

<div class="container">

<h2 align="center">Pendaftaran</h2>

<br>

<p style="color:red;text-align:center;">
<?php echo $message; ?>
</p>

<form method="POST">

<input
type="hidden"
name="csrf_token"
value="<?php echo $_SESSION['csrf_token']; ?>">

<input
type="text"
name="full_name"
placeholder="Nama Lengkap"
required>

<br><br>

<input
type="email"
name="email"
placeholder="Email"
required>

<br><br>

<input
type="text"
name="address"
placeholder="Alamat"
required>

<br><br>

<input
type="text"
name="phone_number"
placeholder="Nomor HP"
required>

<br><br>

<input
type="text"
name="username"
placeholder="Username"
required>

<br><br>

<input
type="password"
name="password"
placeholder="Password"
required>

<br><br>

<button type="submit" name="register">
Daftar
</button>

</form>

<br><br>

<p align="center">
Sudah punya akun?
<a href="login.php">Login</a>
</p>

</div>

</body>
</html>