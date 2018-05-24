<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php
session_start();
include('database_config.php');
if(isset($_POST['search']))
{
	$q = $_POST['srch_query']; //search query of user saved to the variable 'q'
?>



<!-- This form displays the search box with query in the search result page -->
<div style="width:60%; margin-left:15%; margin-top:2%;">
<form method = "post" action="">
	<input type="text" name="srch_query" value ="<?php echo $q ?>" required>
	<button class="btn btn-secondary" type="submit" name="search" value="search">Search</button>
</form><!-- form ends -->

<?php
$search = $dbh->prepare("SELECT * FROM computers WHERE computer LIKE '%$q%' OR price LIKE '%$q%' ");
$search->execute(); // Execute with wildcards

if($search->rowcount()==0){echo "No match found!"; }
else // Echo results
   {

	echo "Search result:<br/>";?>
	<table class="table table-striped" border="1" cellspacing="0" cellpadding="4">
		<thead><tr>
			<th scope="col"> Computer </th>
			<th scope="col"> Price </th>
			<th scope="col"> Ram </th>
			<tbody>
	<?php foreach($search as $s)
	{?>
	<tr class="record">
		<td><?php echo $s['computer']; ?></td>
		<td><?php echo $s['price']; ?></td>
		<td><?php echo $s['ram']; ?></td>
		<td>
			<a href="editform.php?id=<?php echo $s['id']; ?>"><button type="button" class="btn btn-primary">EDIT</button></a>
			&nbsp; | &nbsp; 
			<a href="delete.php?id=<?php echo $s['id']; ?>"><button type="button" class="btn btn-danger">DELETE</button></a>							
		</td>
	</tr>
	<?php }
}
   }?>
			</tbody>
		</tr></thead>
</table><br/>
<a href="add.php"><button type="button" class="btn btn-primary">Add new member</button></a><br/>
</body></html>
</div>
