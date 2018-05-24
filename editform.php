<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
	include('database_config.php');
	$id=$_GET['id'];
	$result = $dbh->prepare("SELECT * FROM computers WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++) {
?>
<div style="width:20%; margin-left:30%; margin-top:2%;">
<h2>Edit</h2><br>
	<form action="edit.php" method="POST">
		<input type="hidden" name="ids" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label for="computer">Computer</label><br>
			<input type="text" class="form-control" name="computer" value="<?php echo $row['computer']; ?>" />
		</div>
		<div class="form-group">
			<label for="price">Price</label><br>
			<input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>" />
		</div>
		<div class="form-group">
			<label for="ram">Ram</label><br>
			<input type="text" class="form-control" name="ram" value="<?php echo $row['ram']; ?>" /><br>
		</div>
		<button type="submit" class="btn btn-primary" value="Save">Save</button>
	</form>
</div>

<?php } ?>