<?php 

session_start();

include "koneksi.php";

check_login();

function query($query) {
    $conn = open_connection();

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // jika hasilnya hanya satu data
    if(mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function check_login()
{
    if (!isset($_SESSION['user_id'])) {
        // Redirect jika pengguna belum masuk
        header("Location: ../login.php");
        exit;
    }
}

function ubah($data) {
    $conn = open_connection();

    $id = $data['user_id'];
    $role = htmlspecialchars($data['role']);

    // Ambil data yang ada di database
    $query_existing = "SELECT * FROM users WHERE id_user = $id";
    $result_existing = mysqli_query($conn, $query_existing);
    $existing_data = mysqli_fetch_assoc($result_existing);

    // Cek apakah data yang baru sama dengan data yang ada di database
    if ($role === $existing_data['role']) {
        // Jika tidak ada perubahan, return 0
        return 0;
    }

    // Jika ada perubahan, lakukan update
    $query_update = "UPDATE users SET role = '$role' WHERE id_user = $id";

    mysqli_query($conn, $query_update);

    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    $conn = open_connection();

    // Hapus semua postingan yang terkait dengan pengguna
    $query_delete_posts = "DELETE FROM posts WHERE id_user = $id";
    $result_delete_posts = mysqli_query($conn, $query_delete_posts);

    if (!$result_delete_posts) {
        $error_message = "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return $error_message;
    }

    // Hapus pengguna
    $query_delete_user = "DELETE FROM users WHERE id_user = $id";
    $result_delete_user = mysqli_query($conn, $query_delete_user);

    if ($result_delete_user) {
        $success_message = "Pengguna dan semua postingannya berhasil dihapus";
        mysqli_close($conn);
        return $success_message;
    } else {
        $error_message = "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return $error_message;
    }
}


?>
