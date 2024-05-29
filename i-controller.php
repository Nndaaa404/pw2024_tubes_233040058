<?php 

include "koneksi.php";

function query($sql) {
    $conn = open_connection();
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function get_post_details($id_post) {
    $conn = open_connection();
    
    // Escape id_post sebelum digunakan dalam query
    $id_post = mysqli_real_escape_string($conn, $id_post);
    
    // Query untuk mendapatkan detail postingan berdasarkan id_post
    $sql = "SELECT posts.*, categories.name_category, users.name_user 
            FROM posts 
            JOIN categories ON posts.id_category = categories.id_category 
            JOIN users ON posts.id_user = users.id_user
            WHERE posts.id_post = '$id_post'";
    
    $result = $conn->query($sql);
    
    // Periksa apakah query berhasil dijalankan
    if (!$result) {
        die("Query error: " . $conn->error);
    }
    
    // Periksa apakah postingan ditemukan
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        die("Post tidak ditemukan.");
    }
    
    $conn->close();
    
    return $post;
}

function view_post() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_post = isset($_POST['id_post']) ? $_POST['id_post'] : null;
        $_SESSION['post_id'] = $id_post;
        header("Location: post_show.php");
        exit;
    }
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $string = [
        'y' => 'tahun',
        'm' => 'bulan',
        'd' => 'hari',
        'h' => 'jam',
        'i' => 'menit',
        's' => 'detik',
    ];

    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' yang lalu' : 'baru saja';
}


?>