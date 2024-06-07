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

// function check_login()
// {
//     if (!isset($_SESSION['user_id'])) {
//         // Redirect jika pengguna belum masuk
//         header("Location: ../login.php");
//         exit;
//     }
// }

function check_login()
{
    // Memeriksa apakah user_id telah diset
    if (!isset($_SESSION['user_id'])) {
        // Redirect jika session belum diset
        header("Location: ../login.php");
        exit;
    } else if ($_SESSION['role'] !== 'admin') {
        // Redirect ke halaman forbidden jika bukan admin
        header("Location: ../forbidden.php");
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

function ubah($data) {

    $conn = open_connection();

    $id = $data['category_id'];
    $name = htmlspecialchars($data['name_category']);

    $query = "UPDATE categories SET name_category = '$name' WHERE id_category = $id";

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
