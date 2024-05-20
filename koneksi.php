<?php 

function open_connection(){

    $koneksi =  mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040058') or die('Koneksi ke DB Gagal!');

    return $koneksi;

}

?>