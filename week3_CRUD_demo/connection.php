<?php 
//ini untuk koneksi antara database dan server web

    $host = "localhost"; //nama host
    $user = "root"; //nama user database
    $pass = ""; //password database
    $db = "libraryborrowingtracker"; //nama database
    $conn = mysqli_connect($host, $user, $pass, $db); //fungsi untuk koneksi ke database

    mysqli_select_db($conn, $db); //memilih database yang akan dipakai

?>