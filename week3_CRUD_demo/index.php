<?php
	include 'connection.php';

	$query = "select * from books;";
	$sql = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	<title>libraryBorrowingTracker</title>
</head>
<body>
	<nav class="navbar bg-body-tertiary">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="#">
      		Library Borrowing Tracker
    		</a>
  		</div>
	</nav>
	<div class="container">
		<h1 class="mt-5">Welcome</h1>
		<figure>
		  <blockquote class="blockquote">
		    <p>Book Data</p>
		  </blockquote>
		  <figcaption class="blockquote-footer">
		    Add, Edit, or Remove
		  </figcaption>
		</figure>
		<a href="addBook.php" type="button" class="btn btn-primary">Add Book</a>
		<div class="table-responsive">
		  <table class="table align-middle table-bordered table-hover">
		    <thead>
		      <tr>
		        <th><center>Book ID</center></th>
		        <th>Book Title</th>
		        <th>Borrow Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		while($result = mysqli_fetch_assoc($sql)){
		    	?>
			     	<tr>
				        <td><center>
				        	<?php echo $result['bookID'];?>
				        </center></td>
				        <td>
				        	<?php echo $result['tittle'];?>
				        </td>
				        <td>
				        	<?php echo $result['borrowStatus'];?>
				        </td>
				        <td>
				        	<a href="addBook.php?edit=<?php echo $result['bookID'];?>" type="button" class="btn btn-success btn-sm">
				        		Edit
				        	</a>
				        	<a href="process.php?remove=<?php echo $result['bookID'];?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">
				        		Remove
				        	</a>
				        </td>
			     	</tr>
			    <?php
			    	}
			    ?>
		    </tbody>
		  </table>
		</div>
	</div>
</body>
</html>