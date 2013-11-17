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
		<h1>Hostel No-dues</h1>
	</div>
	<div id="wrapper">
		<div id="nav">
			<ul>
				<li><a href="hostel.php">Pending validation</a></li>
				<li><a href="hostel.php?history=1">Validation History</a></li>
				<li><a href="index.php?logout=1">Log out</a></li>
			</ul>
		</div>
		<div id="main">
<?php
	if (!isset($_GET["history"])) {
?>
			<h2>List of students pending validation</h2>
			<table>
				<tr>
					<th>Roll Number</th>
					<th>Action</th>
				</tr>
<?php
	
	$query="SELECT roll_no FROM students WHERE hostel_due is NULL";
	if ($result = $mysqli->query($query))
	{
		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			echo "<tr>".
					"<td>$row[roll_no]</td>".
					"<td><a href='admin_action.php?roll=$row[roll_no]&type=h&action=1'>Approve</a> <a href='admin_action.php?roll=$row[roll_no]&type=h&action=0'>Reject</a></td>".
				"</tr>";
		}

		/* free result set */
		$result->free();
	}
?>
			</table>
<?php
	} else {
?>
			<h2>Validation History</h2>
			<table>
				<tr>
					<th>Roll Number</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
<?php
	
	$query="SELECT roll_no, hostel_due FROM students WHERE hostel_due is not NULL";
	if ($result = $mysqli->query($query))
	{
		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			echo "<tr>".
					"<td>$row[roll_no]</td>";
			if ($row["hostel_due"] == '1') 
				echo "<td>Approved</td><td><a href='admin_action.php?roll=$row[roll_no]&type=h&action=0'>Reject</a></td>";
			else
				echo "<td>Rejected</td><td><a href='admin_action.php?roll=$row[roll_no]&type=h&action=1'>Approve</a></td>";
			echo "</tr>";
		}

		/* free result set */
		$result->free();
	}
?>
			</table>
<?php
	}
?>
		</div>
	</div>
</body>
</html>