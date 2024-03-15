<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="../View/Css/Index.css">
		<link rel="icon" type="image/x-icon" href="../Public/Images/Logo.jpg">
		<meta charset="UTF-8">
	</head>
	<body>
		<div class="login-container">
			<h2>Login</h2>
			<form class="login-form" action="../Controller/User/UserController.php" method="POST">
				<label>
					<input type="text" name="username" placeholder="Username">
				</label>
				<label>
					<input type="password" name="password" placeholder="Password">
				</label>
				<div class="button-container">
					<button type="submit" name="LogIn">Log in</button>
					<button type="submit" name="Register">Register</button>
				</div>
			</form>
		</div>
	</body>
</html>
