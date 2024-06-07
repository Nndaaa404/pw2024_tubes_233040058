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
    $name = htmlspecialchars($data['name_user']);
    $password = $data['password'];

    // Ambil data yang ada di database
    $query_existing = "SELECT * FROM users WHERE id_user = $id";
    $result_existing = mysqli_query($conn, $query_existing);
    $existing_data = mysqli_fetch_assoc($result_existing);

    // Cek apakah nama yang baru sama dengan nama yang ada di database
    if ($name === $existing_data['name_user']) {
        // Cek apakah password yang baru sama dengan password yang ada di database
        if (password_verify($password, $existing_data['password'])) {
            // Jika tidak ada perubahan, return 0
            return 0;
        }
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Jika ada perubahan, lakukan update
    $query_update = "UPDATE users SET name_user = '$name', password = '$password' WHERE id_user = $id";

    mysqli_query($conn, $query_update);

    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}



?>
