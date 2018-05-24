<?php
// configuration
include('database_config.php');

// new data
$price = $_POST['price'];
$computer = $_POST['computer'];
$ram = $_POST['ram'];
$id = $_POST['ids'];

// query
$sql = "UPDATE computers
		SET computer=?, price=?, ram=?
		WHERE id=?";
		// '?' Question mark represents "Parameterized Query".

$q = $dbh->prepare($sql);
$q->execute(array($computer,$price,$ram,$id));
header("location: index_afterlogin.php"); 
?>