<?php
    require '../crud.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="adminpage.css">
</head>
<body>

    <div class="container" style="max-width: 600px;"> <div class="header">
            <h1>Tambah Data Buku</h1>
            <a href="adminpage.php" class="btn btn-back">Kembali</a>
        </div>

        <form action="" method="POST">
            
            <div class="form-group">
                <label for="bookID">ID Buku</label>
                <input type="text" id="bookID" name="bookID" placeholder="Contoh: 999-999-0000" required>
            </div>

            <div class="form-group">
                <label for="tittle">Judul Buku</label>
                <input type="text" id="tittle" name="tittle" placeholder="Masukkan judul buku..." required>
            </div>

            <div class="form-group">
                <label for="author">Penulis</label>
                <input type="text" id="author" name="author" placeholder="Masukkan nama penulis..." required>
            </div>

            <div class="form-group">
                <label for="borrowStatus">Status Peminjaman</label>
                <select name="borrowStatus" id="borrowStatus">
                    <option value="Available">Available (Tersedia)</option>
                    <option value="Borrowed">Borrowed (Dipinjam)</option>
                </select>
            </div>

            <input type="hidden" name="action" value="add">

            <button type="submit" class="btn btn-add" style="width: 100%;">Simpan Data</button>

        </form>
    </div>

</body>
</html>