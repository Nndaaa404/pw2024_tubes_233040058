<?php 
require 'koneksi.php';

$conn = open_connection();

// Menangkap request user
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mendapatkan data user berdasarkan username
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

// Cek apakah pengguna ditemukan
if(mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);

    // Verifikasi password
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['user_id'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        
        // Arahkan ke dashboard
        header("Location: dashboard.php");
        exit(); 
    } else {
        // Password salah
        header("Location: login.php?error=wrongpassword");
    }
} else {
    // Pengguna tidak ditemukan
    header("Location: login.php?error=usernotfound");
}
?>
