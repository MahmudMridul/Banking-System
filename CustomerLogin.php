<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title> Customer Login </title>
		<link rel = "stylesheet" href = "style.css">
		<style>
		div
		{
			background-color: Black;
			opacity: 0.8;
			color: White;
			text-align: center;
			font-size: 60px;
			line-height:1.3;
			font-weight:700;
		}
		body
		{
			background-image: url("images/londonbridge.jpg");
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}
		</style>


	</head>

	<body>
		<div> Customer Login </div>
		<form class = "box" action = "customerinformation.php" method = "post">
			<h1> Login </h1>
			<input type = "text" name = "user" placeholder = "e-mail">
			<input type = "text" name = "pass" placeholder = "password">
			<input type = "submit" name = "sub" value = "Login">
		</form>

	</body>
</html>
