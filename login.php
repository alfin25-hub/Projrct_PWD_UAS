<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include 'koneksi.php';
include 'header.php';
include "security/csrf.php";

$message = "";

if(isset($_POST['login'])){

    // =========================
    // Validasi CSRF Token
    // =========================
    if(
        !isset($_POST['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ){
        die("CSRF Token tidak valid!");
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // =========================
    // Prepared Statement
    // =========================
    $stmt = mysqli_prepare($conn,
        "SELECT * FROM users WHERE email=?");

    mysqli_stmt_bind_param($stmt,"s",$email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        // =========================
        // Verifikasi Password
        // =========================
        if(password_verify($password,$user['password'])){

            // Regenerate Session
            session_regenerate_id(true);

            $_SESSION['id_users'] = $user['id_users'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            // =========================
            // Simpan history login
            // =========================
            $ip = $_SERVER['REMOTE_ADDR'];
            $browser = $_SERVER['HTTP_USER_AGENT'];

            $history = mysqli_prepare($conn,
            "INSERT INTO login_history
            (id_users, ip_address, browser)
            VALUES(?,?,?)");

            mysqli_stmt_bind_param(
                $history,
                "iss",
                $user['id_users'],
                $ip,
                $browser
            );

            mysqli_stmt_execute($history);

            if($user['role']=="admin"){

                header("Location: admin/dashboard.php");

            }else{

                header("Location: home.php");

            }

            exit;

        }else{

            $message="Email atau Password salah.";

        }

    }else{

        $message="Email atau Password salah.";

    }

}
?>

<link rel="stylesheet" href="css/login.css">

<head>

<meta charset="UTF-8">

<title>Login</title>

</head>

<body>

<div class="container">

<h2 align="center">Welcome</h2>

<br>

<p style="color:red;text-align:center;">

<?php echo $message; ?>

</p>

<form method="POST">

<input
type="hidden"
name="csrf_token"
value="<?php echo $_SESSION['csrf_token']; ?>">

<input class="email"
type="email"
name="email"
placeholder="Email"
required>

<br><br>

<input class="password"
type="password"
name="password"
placeholder="Password"
required>

<br><br>

<button
type="submit"
name="login">
Login
</button>

</form>

<br><br>

<p align="center">

Belum punya akun?

<a href="pendaftaran.php">

Daftar

</a>

</p>

</div>

</body>