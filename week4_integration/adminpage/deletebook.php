<?php
require '../crud.php';

// UBAH DISINI: Ganti $_POST jadi $_GET
if (isset($_GET['bookID'])) {
    
    $id = $_GET['bookID']; // Ambil dari URL

    if (deleteBook($conn, $id)) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'adminpage.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus!');
                document.location.href = 'adminpage.php';
            </script>
        ";
    }
} else {
    header("Location: adminpage.php");
    exit;
}
?>