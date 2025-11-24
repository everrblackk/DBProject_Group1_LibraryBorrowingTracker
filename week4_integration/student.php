<?php
    include 'connection.php';

    // LOGIKA SEARCH
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        // Cari buku berdasarkan judul ATAU ID
        $query = "SELECT * FROM books WHERE tittle LIKE '%$keyword%' OR bookID LIKE '%$keyword%'";
    } else {
        // Kalau tidak cari, tampilkan semua
        $query = "SELECT * FROM books";
    }
    
    $sql = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Perpustakaan - Halaman Siswa</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Perpustakaan Sekolah</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-3">Daftar Buku Tersedia</h2>

        <form action="student.php" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari judul buku..." value="<?php if(isset($_GET['keyword'])){ echo $_GET['keyword']; } ?>">
                <button class="btn btn-primary" type="submit">Cari Buku</button>
                <a href="student.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover border">
                <thead class="table-dark">
                    <tr>
                        <th>ID Buku</th>
                        <th>Judul Buku</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Cek apakah ada data buku
                        if(mysqli_num_rows($sql) > 0){
                            while($result = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr>
                            <td><?php echo $result['bookID'];?></td>
                            <td><?php echo $result['tittle'];?></td>
                            <td>
                                <?php if($result['borrowStatus'] == 'available'): ?>
                                    <span class="badge bg-success">Tersedia</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Dipinjam</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($result['borrowStatus'] == 'available'): ?>
                                    <a href="process.php?pinjam=<?php echo $result['bookID'];?>" 
                                       class="btn btn-primary btn-sm"
                                       onclick="return confirm('Ingin meminjam buku ini?')">
                                       Pinjam Sekarang
                                    </a>
                                <?php else: ?>
                                    <button class="btn btn-secondary btn-sm" disabled>Tidak Tersedia</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>Buku tidak ditemukan :(</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>