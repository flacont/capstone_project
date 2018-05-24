<?php
	include('database_config.php');
	$id=$_GET['id'];
	$result = $dbh->prepare("DELETE FROM computers WHERE id= :ids");
	$result->bindParam(':ids', $id);
	$result->execute();
	header("location: index_afterlogin.php");
?>