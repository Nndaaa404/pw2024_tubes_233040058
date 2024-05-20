<?php 

include "koneksi.php";

function query($sql) {
    $conn = open_connection();
    // Lakukan Query ke tabel posts
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    // Menyiapkan data posts (fetch)
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
}

?>