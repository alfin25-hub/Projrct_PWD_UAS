<?php
include "../koneksi.php";

if(isset($_GET['id']))
{
    $id = (int)$_GET['id'];

    $cek = mysqli_query(
        $conn,
        "SELECT role FROM users WHERE id_users = $id"
    );

    $user = mysqli_fetch_assoc($cek);

    if($user && $user['role'] == 'admin')
    {
        echo "
        <script>
            alert('Admin tidak bisa dihapus!');
            window.location='users.php';
        </script>";
        exit;
    }

    mysqli_query(
        $conn,
        "DELETE FROM users WHERE id_users = $id"
    );

    echo "
    <script>
        alert('User berhasil dihapus!');
        window.location='users.php';
    </script>";
}
?>