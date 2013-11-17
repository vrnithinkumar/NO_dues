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
			<h1>No dues - just a click away</h1>
		</div>
	<div id="results">
		<h2><u>Status</u></h2>
		<h3>
<?php
require_once('config.php');
$mysqli= new mysqli($host,$db_user,$db_password,$db_name);
	
/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$roll = $_REQUEST["rollno"];
if (!$roll || !preg_match("/[bBmMpP][0-9]{6}[A-Za-z]{2}/", $roll))
	{
		$res1 = "Invalid Roll Number!";
		$res2 ="";
	}
else{	
if (isset($_REQUEST["apply"])) {
	$query = "INSERT IGNORE INTO students (roll_no) VALUES ('$roll')";
	$mysqli->query($query);
	$query = "UPDATE `students` SET hostel_due=null WHERE roll_no='$roll' AND hostel_due=0";
	$mysqli->query($query);
	$query = "UPDATE `students` SET library_due=null WHERE roll_no='$roll' AND library_due=0";
	$mysqli->query($query);
	$res1 = "Successfully applied!";
	$res2 ="";
} else if (isset($_REQUEST["status"])) {

	$query="SELECT * FROM students WHERE roll_no='$roll'";
	if ($result = $mysqli->query($query))
	{
		/* fetch associative array */
		if ($row = $result->fetch_assoc()) {
			if ($row["hostel_due"] === null)
				$res1 = "Hostel dues are yet to be approved.\n";
			else if ($row["hostel_due"] == 1)
				$res1 = "You have NO hostel dues.\n";
			else
				$res1 = "Your hostel no-dues request was REJECTED.\n";
			/*echo "<br/>\n";*/
			if ($row["library_due"] === null)
				$res2 = "Library dues are yet to be approved.\n";
			else if ($row["library_due"] == 1)
				$res2 = "You have NO library dues.\n";
			else
				$res2 = "Your library no-dues request was REJECTED.\n";
		}

		/* free result set */
		$result->free();
	}
}
}
echo "<p>";
echo $res1;
echo "</p>";
echo "<p>";
echo "\n";
echo $res2;
echo "</p>";
?>
</h3>
<p><a href="index.php"> Go Back </a>
	</div>
		<div id="footer">
		Save Our Trees..Save Paper, Save Trees, Save Money
	</div>
</body>
</html>