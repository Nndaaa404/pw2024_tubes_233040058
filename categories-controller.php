<?php 

session_start();

include "koneksi.php";

check_login();

function query($sql) {
    $conn = open_connection();
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
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

function tambah($data) {

    $conn = open_connection();

    $name = htmlspecialchars($data['name_category']);

    $query = "INSERT INTO categories VALUES (null, '$name')";

    mysqli_query($conn, $query);

    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function hapus($id) {

    $conn = open_connection();
    
    // Cek apakah kategori masih terhubung dengan postingan
    $query_check_post = "SELECT COUNT(*) as total_post FROM posts WHERE id_category = $id";
    $result_check_post = mysqli_query($conn, $query_check_post);
    $row_check_post = mysqli_fetch_assoc($result_check_post);
    $total_post = $row_check_post['total_post'];

    if ($total_post > 0) {
        // Jika kategori masih terhubung dengan postingan, beri pesan kesalahan
        echo "Error: Kategori masih digunakan oleh postingan lain";
        return -1;
    }

    // Jika tidak ada postingan yang terhubung dengan kategori, lanjutkan penghapusan
    $query_delete_category = "DELETE FROM categories WHERE id_category = $id";
    $result_delete_category = mysqli_query($conn, $query_delete_category);

    if ($result_delete_category) {
        return mysqli_affected_rows($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
        return -1;
    }

    mysqli_close($conn);
}


?>
