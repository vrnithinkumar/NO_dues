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
	}
	#nitclogo img {
		width: 320px;
	}
	#adminform, #studentsform {
		float: right;
		width: 260px;
		margin: 0 8px;
		padding: 10px;
		background-color: rgb(116, 192, 207);
		border: 1px solid #bbd;
		text-align: center;
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
	form {
		margin: 0;
	}
	#footer {
		padding: 20px 20px 10px;
		background-color: rgb(116, 207, 192);
		text-align: center;
		color: #433;
		border-top: 1px solid #cb9;
	}
	</style>
</head>
<body>
	<div id="header">
		<h1>No dues - just a click away</h1>
		<h4>Making it possible for all college administration to manage students subject registration which includes hostel dues, library dues...</h4>
	</div>
	<div id="wrapper">
		<div id="adminform">
			<h2>Admin Login</h2>
			<form method="post" action="redirect.php">
				<input type="text" name="user" placeholder="Username" />
				<input type="password" name="pass" placeholder="Password" />
				<input type="submit" value="Log in" />
			</form>
		</div>
		<div id="studentsform">
			<h2>Student</h2>
			<form method="post" action="student_form.php">
				<input type="text" name="rollno" placeholder="Roll Number" />
				<input type="submit" name="apply" value="Apply" />
				<input type="submit" name="status" value="Get Status" />
			</form>
		</div>
		<div id="nitclogo">
			<img src="nitc-logo.png" />
		</div>
	</div>
	<div id="footer">
		Save Our Trees...  Save Paper, Save Trees, Save Money
	</div>
</body>
</html>