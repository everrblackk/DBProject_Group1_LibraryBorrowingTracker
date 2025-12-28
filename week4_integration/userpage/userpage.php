<?php
    require '../crud.php';

    // Cek apakah tombol cari ditekan
    if (isset($_GET['cari'])) {
        $keyword = $_GET['keyword'];
        $daftarbuku = cariBuku($conn, $keyword);
    } else {
        // Jika tidak mencari, tampilkan semua
        $daftarbuku = showBooks($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userpage.css">
</head>
<body>
    <div class="bg-shape"></div>

   <nav class="navbar">
        <div class="logo">LIBRARY</div>
        
        <ul class="nav-links">
            <li><a href="#" class="active">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
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

    <header class="hero-container">
        
        <div class="hero-text">
            <h1>Discover Your <br> Next Great Read</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            <a href="books.php" class="btn-explore">EXPLORE COLLECTION</a>
        </div>

        <div class="hero-image">
            <img src="Gemini_Generated_Image_z7sx1xz7sx1xz7s-removebg-preview.png" alt="Reading Illustration">
            
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
        </div>

    </header>

    <section class="featured-section">
        <h2 class="section-title">FEATURED BOOKS</h2>

        <div class="featured-grid">
            
            <div class="card card-large">
                <div class="card-content">
                    <h3>Boolgstant<br>Book</h3>
                    <p>Lorem Ipsum</p>
                </div>
                <div class="card-img-wrapper">
                    <img src="https://cdn-icons-png.flaticon.com/512/3389/3389081.png" alt="Book" class="img-large">
                </div>
            </div>

            <div class="card card-small">
                <div class="small-img-wrapper">
                    <img src="https://cdn-icons-png.flaticon.com/512/29/29302.png" alt="Book">
                </div>
                <h3>Minimasit Cover</h3>
                <p>Lorem ipsum</p>
            </div>

            <div class="card card-small">
                <div class="small-img-wrapper">
                    <img src="https://cdn-icons-png.flaticon.com/512/29/29302.png" alt="Book" style="filter: hue-rotate(90deg);">
                </div>
                <h3>Bladket Cover</h3>
                <p>Lorem ipsum</p>
            </div>

            <div class="card card-small">
                <div class="small-img-wrapper">
                    <img src="https://cdn-icons-png.flaticon.com/512/29/29302.png" alt="Book" style="filter: hue-rotate(180deg);">
                </div>
                <h3>Reader</h3>
                <p>Lorem ipsum</p>
            </div>

        </div>
    </section>

    <section class="services-section">
        <h2 class="section-title" style="text-align: center;">SERVICES</h2>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="icon-wrapper">
                    <img src="https://cdn-icons-png.flaticon.com/512/2232/2232688.png" alt="Digital Library">
                </div>
                <h3>Digital Library</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <div class="service-card">
                <div class="icon-wrapper">
                    <img src="https://cdn-icons-png.flaticon.com/512/751/751463.png" alt="Research">
                </div>
                <h3>Research</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <div class="service-card">
                <div class="icon-wrapper">
                    <img src="https://cdn-icons-png.flaticon.com/512/1256/1256650.png" alt="Study Rooms">
                </div>
                <h3>Study Rooms</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </section>
</body>
</html>