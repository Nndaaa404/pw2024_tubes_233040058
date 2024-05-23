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
        header("Location: login.php");
        exit;
    }
}

?>
