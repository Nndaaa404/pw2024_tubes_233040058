<?php
require_once "koneksi.php";
$conn = open_connection();

function registrasi($data) {
    global $conn;

    $name = trim($data["name_user"]);
    $username = strtolower(stripslashes($data["username"]));
    $email = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
    $password = mysqli_real_escape_string($conn, $data["password"]);

    // cek username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah ada')</script>";
        return false;
    }

    // cek email
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Email sudah ada')</script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $query = "INSERT INTO users (name_user, username, email, password, role) VALUES('$name', '$username', '$email', '$password', 'user')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
