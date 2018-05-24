<?php
require 'database_config.php'; //Database connection
session_start(); //Start the session

if(isset($_POST['username']))
{	$username = $_POST['username'];	 }

if(isset($_POST['password']))
{	$password = $_POST['password'];	 }

// Check whether the entered username/password pair exist in the database
$q = 'SELECT * FROM users WHERE username=:username AND password=:password';
$query = $dbh->prepare($q);
$query->execute(array(':username' => $username, ':password' => $password));

if($query->rowCount() == 0)
{	header('Location: index.php?err=1');   }

else
{
	//fetch he result as associative array
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	//Store the fetched details into $_SESSION
	$_SESSION['sess_user_id'] = $row['id'];
	$_SESSION['sess_username'] = $row['username'];
	$_SESSION['sess_userrole'] = $row['role'];
	
	if( $_SESSION['sess_userrole'] == "suadmin")
	{ header('Location: suadminhome.php'); }
	
	elseif( $_SESSION['sess_userrole'] == "Admin")
	{ header('Location: index_afterlogin.php'); }
	
	else
	{ header('Location: userhome.php'); }
}
?>