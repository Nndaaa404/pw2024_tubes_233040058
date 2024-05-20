<?php 
require 'koneksi.php';

$conn = open_connection();

// Mulai sesi
session_start();

function upload() {
   
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ( $error ===4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!')
              </script>";
                return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar!')
              </script>";
                return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!')
              </script>";
                return false;
    }

    // lolos pengecekan gambar, gambar siap diupload
    // generate nama gambar baru
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $ekstensiGambar;
    // var_dump($namafileBaru);die();



    move_uploaded_file($tmpName, 'assets/img/' . $namafileBaru);

    return $namafileBaru;

}


// Menangkap request user
$action = isset($_POST['action']) ? $_POST['action'] : null;

if ($action == 'login') {
    // Masuk ke dalam akun
} else if ($action == 'create_post') {
    // Membuat postingan baru

    // Periksa apakah pengguna masuk
    if (!isset($_SESSION['user_id'])) {
        // jika pengguna tidak masuk maka redirect ke halaman login
        header("Location: login.php");
        exit;
    }

    // var_dump($_POST);
    // var_dump($_FILES);
    // die();

    // Ambil data yang diperlukan dari form
    $title = $_POST['title'];
    $id_category = $_POST['category'];
    $excerpt = $_POST['excerpt'];
    $body = $_POST['body'];
    
    // upload gambar

    $image = upload();
    if ( !$image ) {
        return false;
    }


    // Query untuk menambahkan posting baru
    $sql = "INSERT INTO posts (id_category, id_user, title, excerpt, body, image)
            VALUES ('$id_category', '{$_SESSION['user_id']}', '$title', '$excerpt', '$body', '$image')";

    

    // Jalankan query
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil menambah post maka redirect ke halaman posts.php
        header("Location: posts.php");
        exit;
    } else {
        // jika tidak maka tampilkan erorr
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($action == 'delete_post') {
    // Menghapus postingan

    // Periksa apakah pengguna masuk
    if (!isset($_SESSION['user_id'])) {
        // Redirect jika pengguna belum masuk
        header("Location: login.php");
        exit;
    }

    // Ambil id_post yang akan dihapus
    $id_post = $_POST['id_post'];

    // Query untuk mendapatkan nama file gambar posting yang akan dihapus
    $sql_get_image = "SELECT image FROM posts WHERE id_post = '$id_post'";
    $result_image = $conn->query($sql_get_image);

    // Jika berhasil mendapatkan nama file gambar
    if ($result_image->num_rows > 0) {
        $row_image = $result_image->fetch_assoc();
        $image_path = 'assets/img/' . $row_image['image'];

        // Hapus gambar dari direktori
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // Query untuk menghapus posting berdasarkan id_post
    $sql = "DELETE FROM posts WHERE id_post = '$id_post'";

    // Jalankan query
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil menghapus maka redirect ke halaman posts.php
        header("Location: posts.php");
        exit;
    } else {
        // Jika gagal menghapus maka tampilkan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Query untuk mendapatkan data posting dari database
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Jika pengguna adalah admin, dapatkan semua postingan
    $sql = "SELECT posts.*, categories.name_category, users.name_user 
            FROM posts 
            JOIN categories ON posts.id_category = categories.id_category 
            JOIN users ON posts.id_user = users.id_user";
} else {
    // Jika pengguna bukan admin, hanya dapatkan postingan yang dibuat oleh pengguna tersebut
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    if ($user_id !== null) {
        $sql = "SELECT posts.*, categories.name_category, users.name_user 
                FROM posts 
                JOIN categories ON posts.id_category = categories.id_category 
                JOIN users ON posts.id_user = users.id_user
                WHERE posts.id_user = $user_id";
    } else {
        // Tindakan jika tidak ada id pengguna yang tersedia
    }
}

$result = $conn->query($sql);

// Inisialisasi variabel $posts untuk menampung data posting
$posts = [];

if ($result->num_rows > 0) {
    // Loop melalui setiap baris hasil dan simpan data posting dalam array $posts
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

// Tutup koneksi
$conn->close();

?>
