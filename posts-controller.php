<?php
// buatkan fungsi terkait pengurangan tanggal posts

session_start();

include 'koneksi.php';

check_login();

function query($query)
{
    $conn = open_connection();

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // jika hasilnya hanya satu data
    if (mysqli_num_rows($result) == 1) {
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

function upload()
{
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!')
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!')
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!')
              </script>";
        return false;
    }

    // lolos pengecekan gambar, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // var_dump($namaFileBaru);die();

    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);

    return $namaFileBaru;
}

function tambah($data)
{

    $conn = open_connection();

    // Ambil data yang diperlukan dari form
    $title = $data['title'];
    $id_category = $data['category'];
    $body = $data['body'];

    // Ambil excerpt dari body sebesar 200 karakter
    $excerpt = strip_tags($body, '<p>');
    $excerpt = substr($excerpt, 0, 200);

    // upload gambar
    $image = upload();
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO posts (id_category, id_user, title, excerpt, body, image)
            VALUES ('$id_category', '{$_SESSION['user_id']}', '$title', '$excerpt', '$body', '$image')";

    mysqli_query($conn, $query);

    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function ubah($data) {

    $conn = open_connection();

    // Ambil data yang diperlukan dari form
    $id_post = $data['id_post'];
    $title = $data['title'];
    $id_category = $data['category'];
    $body = $data['body'];
    $old_image = $data['old_image'];

    // Ambil excerpt dari body sebesar 200 karakter
    $excerpt = strip_tags($body, '<p>');
    $excerpt = substr($excerpt, 0, 200);

    // Cek apakah ada gambar baru yang diupload
    if ($_FILES['image']['error'] === 4) {
        $image = $old_image;
    } else {
        $image = upload();
        if (!$image) {
            return false;
        }
        // Hapus gambar lama jika ada gambar baru yang diupload
        $old_image_path = 'assets/img/' . $old_image;
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
    }

    $query = "UPDATE posts SET id_category = '$id_category', title = '$title', excerpt = '$excerpt', body = '$body', image = '$image' 
    WHERE id_post = '$id_post'";

    mysqli_query($conn, $query);

    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function hapus($id) {

    $conn = open_connection();
    
    // Query untuk mendapatkan nama file gambar posting yang akan dihapus
    $sql_get_image = "SELECT image FROM posts WHERE id_post = '$id'";
    $result_image = $conn->query($sql_get_image);

    if ($result_image->num_rows > 0) {
        $row_image = $result_image->fetch_assoc();
        $image_path = 'assets/img/' . $row_image['image'];

        // Hapus gambar dari direktori
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // Jika tidak ada postingan yang terhubung dengan kategori, lanjutkan penghapusan
    $query_delete_post = "DELETE FROM posts WHERE id_post = $id";
    $result_delete_post = mysqli_query($conn, $query_delete_post);

    if ($result_delete_post) {
        return mysqli_affected_rows($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
        return -1;
    }

    mysqli_close($conn);
}
