<?php
//ini untuk fungsi CRUD (Create, Read, Update, Delete) pada database

include "connection.php"; //memanggil file connection.php untuk koneksi ke database

//fungsi untuk menambahkan data baru ke dalam database
function addBook($conn, $data) {
    $bookID = $data['bookID'];
    $tittle = $data['tittle'];
    $author = $data['author'];
    $borrowStatus = $data['borrowStatus'];

    $query = "INSERT INTO books (bookID, tittle, author, borrowStatus) VALUES ('$bookID', '$tittle', '$author', '$borrowStatus')";
    return mysqli_query($conn, $query);
}

//fungsi untuk menampilkan semua data dari database
function showBooks($conn) {
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn, $query);
    $books = [];
    //ini untuk membaca loop, nantinya di html akan ada loop
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }
    return $books;
}

//fungsi untuk mengupdate data berdasarkan bookID
function updateBook($conn, $data) {
    $bookID = $data['bookID'];
    $tittle = $data['tittle'];
    $author = $data['author'];
    $borrowStatus = $data['borrowStatus'];

    $query = "UPDATE books SET tittle='$tittle', author='$author', borrowStatus='$borrowStatus' WHERE bookID='$bookID'";
    return mysqli_query($conn, $query);
}

//fungsi untuk menghapus data berdasarkan bookID
function deleteBook($conn, $bookID) {
    $query = "DELETE FROM books WHERE bookID='$bookID'";
    return mysqli_query($conn, $query);
}

//fungsi untuk mendapatkan data buku berdasarkan bookID
function getBookByID($conn, $bookID) {
    $query = "SELECT * FROM books WHERE bookID='$bookID'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

//fungsi untuk search
function cariBuku($conn, $keyword) {
    $query = "SELECT * FROM books WHERE 
              tittle LIKE '%$keyword%' OR 
              author LIKE '%$keyword%'";
    
    $result = mysqli_query($conn, $query);
    $books = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }
    return $books;
}

//logika control
if(isset($_POST['action'])) {
    
    // --- LOGIKA TAMBAH ---
    if ($_POST['action'] == "add") {
        if(addBook($conn, $_POST)) {
            header("location: adminpage.php");
            exit;
        } else {
            echo "Gagal menambah data.";
        }
        
    // --- LOGIKA UPDATE ---
    } else if ($_POST['action'] == "update") { 
        if(updateBook($conn, $_POST)) {
            header("location: adminpage.php");
            exit;
        } else {
            echo "Gagal mengupdate data.";
        }
    }
}



?>