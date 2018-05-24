<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div style="width:60%; margin-left:15%; margin-top:2%;">
	<form method="post" action="">
		<h3>Add an item</h3>
		<table>
			<tr>
			<div class="form-group"></div>
				<td><label for="c_computer">Computer:  </label></td>
				<td><input type="text" class="form-control" name="c_computer"></td>
			</div>
			</tr>

			<tr>
			<div class="form-group"></div>
				<td><label for="p_price">Price:  </label></td>
				<td><input type="text" class="form-control" name="p_price"></td>
			</div>
			</tr>

			<tr>
			<div class="form-group">
				<td><label for="r_ram">Ram:  </label></td>
				<td><input type="text" class="form-control" name="r_ram"></td>
			</div>
			</tr><br>

			<tr>
				<td></td>
				<td><button type="submit" class="btn btn-primary" name="addbtn" value="Add Item">Add Item</button></td>
			</tr>
		</table>
	</form>
	<a href="index_afterlogin.php"><button type="button" class="btn btn-secondary">View</button></a><br/>
</div>

<?php
if(isset($_POST['addbtn']))
{
	try
	{
		include('database_config.php');
		$stmt = $dbh->prepare("INSERT INTO computers(computer,price,ram)VALUES(:Computer,:Price,:Ram)");
		$stmt->execute(array("Computer" => $_POST['c_computer'],
							 "Price" => $_POST['p_price'],
							 "Ram" => $_POST['r_ram']
							));
		echo "Registration Successful!";
	}
	catch(PDOException $e)
	{
		echo 'ERROR: ' . $e->getMessage();
	}
}
?>