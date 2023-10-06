<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="icon" href="assets/images/1200px-Instagram.svg.png" type="image/png">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Register</h3>
			</div>
			<div class="card-body">
				<form method="post" action="user_insert.php">
					<input type="text" name="name" placeholder="Name" required class ="form-control"><br>
					<input type="text" name="surname" placeholder="Surname" required class="form-control"><br>
					<input type="text" name="username" placeholder="Username" required minlength="6" class="form-control"><br>
					<input type="email" name="email" placeholder="Email" required class="form-control"><br>
					<input type="password" name="password" placeholder="Password" required minlength="8" class="form-control"><br>
					<input type="submit" value="Register" class="btn float-right login_btn">
					<input type="reset" value="Reset" class="btn float-right login_btn"><br>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="index.php">Back to Login!</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
