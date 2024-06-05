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
        $_SESSION['name_user'] = $row['name_user'];
        $_SESSION['role'] = $row['role'];
        
        // Arahkan ke dashboard
        echo "<script>
                alert('Login berhasil');
                document.location.href = 'home-dashboard.php';
              </script>";
        exit(); 
    } else {
        // Password salah
        echo "<script>
                alert('Password salah. Silakan coba lagi.');
                document.location.href = 'login.php';
              </script>";
        exit();
    }
} else {
    // Pengguna tidak ditemukan
    echo "<script>
            alert('Pengguna tidak ditemukan. Silakan coba lagi.');
            document.location.href = 'login.php';
          </script>";
    exit();
}
?>
