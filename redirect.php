<?php
require_once('config.php');
$mysqli= new mysqli($host,$db_user,$db_password,$db_name);
	
/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
$query="SELECT type FROM nodues_users WHERE username='$_REQUEST[user]' AND password='$_REQUEST[pass]'";
if (($result=$mysqli->query($query)) && ($row=$result->fetch_array())) {
	if ($row[type]=='h')
		header('Location: hostel.php');
	else if ($row[type]=='l')
		header('Location: library.php');
	else if ($row[type]=='r')
		header('Location: registrar.php');
} else
	echo "Wrong username/password. Please go back and try again..."
?>