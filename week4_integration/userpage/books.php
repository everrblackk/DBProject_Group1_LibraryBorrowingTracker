<?php
require '../crud.php';

// --- LOGIKA PENCARIAN ADA DISINI ---
// Jika ada keyword di URL (hasil lemparan dari Navbar), cari bukunya.
// Jika tidak, tampilkan semua buku.
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $daftarbuku = cariBuku($conn, $keyword);
    $judulHalaman = "Hasil Pencarian: '" . htmlspecialchars($keyword) . "'";
} else {
    $daftarbuku = showBooks($conn);
    $judulHalaman = "Koleksi Semua Buku";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku - Perpustakaan Kita</title>
    <link rel="stylesheet" href="userpage.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo"><a href="index.php" style="text-decoration:none; color:inherit;">LIBRARY</a></div>
        
        <ul class="nav-links">
            <li><a href="userpage.php">HOME</a></li>
            <li><a href="#" class="active">BOOKS</a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">CONTACT</a></li>
            
            <li class="search-wrapper">
                <form action="books.php" method="GET" class="nav-search-form">
                    <input type="text" name="keyword" placeholder="Cari buku..." required autocomplete="off">
                    <button type="submit">🔍</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container" style="margin-top: 40px; margin-bottom: 20px; justify-content: center; text-align: center;">
        <h2 style="border-bottom: 2px solid #6c5ce7; display: inline-block; padding-bottom: 5px;">
            <?= $judulHalaman; ?>
        </h2>
    </div>

    <main class="container">
        
        <?php if(empty($daftarbuku)) : ?>
            <div class="empty-state">
                <p>Maaf, buku yang kamu cari tidak ditemukan :(</p>
                <a href="books.php" class="btn-explore" style="margin-top:10px; font-size:12px;">Lihat Semua Buku</a>
            </div>
        <?php endif; ?>

        <div class="book-grid">
            <?php foreach ($daftarbuku as $buku) : ?>
                <div class="book-card">
                    <div class="book-cover">📖</div>
                    <div class="book-info">
                        <h3><?= $buku['tittle']; ?></h3> <p class="author">karya <?= $buku['author']; ?></p>
                        
                        <div class="status-badge <?= $buku['borrowStatus'] == 'available' ? 'status-green' : 'status-red'; ?>">
                            <?= $buku['borrowStatus']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <div style="height: 50px;"></div>

</body>
</html>