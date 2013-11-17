<html>
<head>
	<style>
	body {
		padding: 0;
		margin: 0;
		background-color: #F0F0F0;
	}
	#header {
		padding: 20px 20px 10px;
		background-color: rgb(237, 132, 116); /*rgb(225, 91, 80);*/
		text-align: center;
		color: #fdfdfa;
		border-bottom: 1px solid #cb9;
	}
	h1 {
		margin: 16px 0 8px;
	}
	#wrapper {
		margin: 10px;

	}

	#nitclogo {
		padding: 10px;
		margin-right: 600px;
		background-color: #FEFEFE;
		text-align: center;
		border: 1px solid #ccc;
		min-width: 320px;
		float: right;
	}
	#nitclogo img {
		width: 320px;
	}
	#results {

		margin: 0 8px;
		padding: 10px;
		background-color: rgb(116, 192, 207);
		border: 1px solid #bbd;
		text-align: center;
		height: 425px;
		color: #fefefe;
	}
	input[type=text], input[type=password] {
		width: 256px;
		height: 30px;
	}
	input {
		margin: 3px;
	}
	form {
		margin: 0;
	}
	#footer {
		padding: 20px 20px 10px;
		background-color: rgb(116, 220, 192);
		text-align: center;
		color: #433;
		border-top: 1px solid #cb9;
	}
	</style>
</head>
<body>

	<div id="header">
			<h1>No dues : Status change Confirmation </h1>
		</div>
	<div id="results">
		
		<h3>
<?php
require_once('config.php');
$mysqli= new mysqli($host,$db_user,$db_password,$db_name);
	
/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$type = $_GET["type"];
$rollno = $_GET["roll"];
$action = $_GET["action"];

$col = '';
echo "Status of ";
echo "<u>";
echo $rollno;
echo "</u>";
echo " Successfully changed!\n";

if ($type == 'h'){
	$col = "hostel_due";
	echo "<p><a href=\"hostel.php\">Go Back</a></p>";
}
else if ($type == 'l'){
	$col = "library_due";
	echo "<p><a href=\"library.php\">Go Back</a></p>";
}
if ($col) {
	$query = "UPDATE students SET $col='$action' WHERE roll_no='$rollno'";
	$mysqli->query($query);
}
?>
</h3>

	</div>
		<div id="footer">
		Save Our Trees..Save Paper, Save Trees, Save Money
	</div>
</body>
</html>



