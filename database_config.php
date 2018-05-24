<?php
// Define database related variables
	$host = 'localhost';
	$user = 'root';
	$pass = '';
$database = 'admindb';

// try to connect to database
$dbh = new PDO('mysql:host='.$host.'; dbname='.$database, $user, $pass);

if(!$dbh)
{
	echo "unable to connect to database";
}
/* End config */

?>