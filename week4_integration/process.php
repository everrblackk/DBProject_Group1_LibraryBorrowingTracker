<?php
	include 'connection.php';

	if(isset($_POST['action'])) {
		if ($_POST['action'] == "add") {
			$bookID = $_POST['bookID'];
			$tittle = $_POST['tittle'];
			$borrowStatus = $_POST['borrowStatus'];

			$query = "INSERT INTO books VALUES('$bookID', '$tittle', '$borrowStatus', null)";
			$sql = mysqli_query($conn, $query);

			if($sql){
				header("location: index.php");
				//echo "Succesfully Added Data <a href='index.php'>[Home]</a>";
			} else {
				echo $query;
			}

			//echo $bookID." | ".$tittle." | ".$borrowedStatus;

			//echo "Confirm Addition <a href='index.php'>[Home]</a>";
		} else if ($_POST['action'] == "change") {
			echo "Confirm Change <a href='index.php'>[Home]</a>";
		}
	}

	if (isset($_GET['remove'])) {
		$bookID = $_GET['remove'];
		$query = "DELETE FROM books WHERE bookID = '$bookID';";
		$sql = mysqli_query($conn, $query);
		//echo "Confirm Removal <a href='index.php'>[Home]</a>";

		if($sql){
				header("location: index.php");
				//echo "Succesfully Added Data <a href='index.php'>[Home]</a>";
			} else {
				echo $query;
			}
	}

	
    if (isset($_GET['pinjam'])) {
        $bookID = $_GET['pinjam'];
        
        // Ubah status jadi 'borrowed'
        $query = "UPDATE books SET borrowStatus = 'borrowed' WHERE bookID = '$bookID'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            // Kembali ke halaman student
            header("location: student.php");
        } else {
            echo "Gagal meminjam: " . mysqli_error($conn);
        }
    }
?>