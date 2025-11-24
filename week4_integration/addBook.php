<!DOCTYPE html>

<?php
	include 'connection.php';

	$bookID = '';
	$tittle = '';
	$borrowStatus = '';

	if(isset($_GET['edit'])) {
		$bookID = $_GET['edit'];

		$query = "SELECT * from books where bookID = '$bookID';";
		$sql = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($sql);

		$tittle = $result['tittle'];
		$borrowStatus = $result['borrowStatus'];
	}
?>

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
	<nav class="navbar bg-body-tertiary mb-4">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="#">
      		Library Borrowing Tracker
    		</a>
  		</div>
	</nav>
	<div class="container">
		<form method="POST" action="process.php">
			<div class="mb-3 row">
			  <label for="bookID" class="col-sm-2 col-form-label">
			  	Book ID
			  </label>
				<div class="col-sm-10">
			    	<input type="text" name="bookID" class="form-control" id="bookID" value="<?php echo $bookID; ?>">
				</div>
			</div>
			<div class="mb-3 row">
			  <label for="tittle" class="col-sm-2 col-form-label">
			  	Book Title
			  </label>
				<div class="col-sm-10">
			    	<input type="text" name="tittle" class="form-control" id="tittle" value="<?php echo $tittle; ?>">
				</div>
			</div>
			<div class="mb-3 row">
			  <label for="borrowStatus" class="col-sm-2 col-form-label">
			  	Borrow Status
			  </label>
				<div class="col-sm-10">
					<select id="borrowStatus" name="borrowStatus" class="form-select">
					  <option selected>Select</option>
					  <option <?php if($borrowStatus == 'available') { echo "selected";}?> value="available">Available</option>
					  <option <?php if($borrowStatus == 'borrowed') { echo "selected";}?> value="borrowed">Borrowed</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
						if(isset($_GET['edit'])) {
					?>
						<button type="submit" name="action" value="change" class="btn btn-primary">
							Confirm
						</button>
					<?php
						} else {
					?>
						<button type="submit" name="action" value="add" class="btn btn-primary">
							Confirm
						</button>
					<?php
						} 
					?>
					<a href="index.php" type="button" class="btn btn-danger">
						Cancel
					</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>