<?php
    require '../crud.php';

    $daftarbuku = showBooks($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminpage.css">
    <title>Admin page</title>
</head>
<body>
    <h1>SELAMAT DATANG DI ADMIN PAGE</h1>
    <h2>Disini kamu bisa melakukan add update dan delete buku dalam databse</h2>

    <div class="container">
        <div class="header">
            <h1>DAFTAR BUKU:</h1>
            <a href="addbook.php" class="btn btn-add">Add Book</a>
        </div>

        <div class="table-book-list">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>BorrowStatus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarbuku as $buku) : ?>
                       <tr>
                            <td><?php echo $buku['bookID']; ?></td>
                            <td><?php echo $buku['tittle']; ?></td>
                            <td><?php echo $buku['author']; ?></td>
                            <td><?php echo $buku['borrowStatus']; ?></td>
                            <td>
                                <a href="updatebook.php?bookID=<?php echo $buku['bookID']; ?>" class="btn btn-edit">Update</a>
                                <a href="deletebook.php?bookID=<?php echo $buku['bookID']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                            </td>
                       </tr> 
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        

    </div>
    
</body>
</html>