<?php
require_once('config.php');
$mysqli= new mysqli($host,$db_user,$db_password,$db_name);
	
/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
?>
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
		background-color: rgb(237, 132, 116);
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
	#main {
		padding: 20px;
		margin-left: 300px;
		background-color: #FEFEFE;
		border: 1px solid #ccc;
		min-width: 320px;
	}
	#nav {
		float: left;
		width: 270px;
		margin: 0;
		padding: 10px;
		background-color: rgb(116, 192, 207);
		border: 1px solid #bbd;
		height: 380px;
		color: #fefefe;
	}
	input[type=text], input[type=password] {
		width: 256px;
		height: 30px;
	}
	input {
		margin: 3px;
	}
	</style>
</head>
<body>
	<div id="header">
		<h1>No-dues: Registrar</h1>
	</div>
	<div id="wrapper">
		<div id="nav">
			<ul>
				<li><a href="index.php?logout=1">Log out</a></li>
			</ul>
		</div>
		<div id="main">
			<h1>Verify</h1>
			<form method="post">
				<input type='text' name='rollno' placeholder='Roll number' />
				<input type='submit' value='Check Status' />
			</form>
<?php
if (isset($_POST['rollno'])) {
	$roll = $_POST['rollno'];
	$query="SELECT * FROM students WHERE roll_no='$roll'";
	if ($result = $mysqli->query($query))
	{
		/* fetch associative array */
		if ($row = $result->fetch_assoc()) {
			echo "<h3>Status of $roll</h3>";
			if ($row["hostel_due"] === null)
				echo "Hostel no-dues - yet to be approved.\n";
			else if ($row["hostel_due"] == 1)
				echo "Hostel no-dues request was <b>APPROVED</b>.\n";
			else
				echo "Hostel no-dues request was <b>REJECTED</b>.\n";
			echo "<br/>\n";
			if ($row["library_due"] === null)
				echo "Library no-dues - yet to be approved.\n";
			else if ($row["library_due"] == 1)
				echo "Library no-dues request was <b>APPROVED</b>.\n";
			else
				echo "Library no-dues request was <b>REJECTED</b>.\n";
		} else
			echo "No such roll number.";
		/* free result set */
		$result->free();
	}
}
?>
		</div>
	</div>
</body>
</html>