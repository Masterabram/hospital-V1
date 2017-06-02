<?php
	session_start();
	include_once('includes/functions.php');

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		login($username, $password);
	}
?>

 
<!doctype html>
<html>
<head>
<title>staff Login</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<?php echo errors(); ?>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" id="inputSuccess4" placeholder="username" type="text" required>
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<br />
<input name="submit" class="btn btn-primary btn-lg" type="submit" value=" Login ">

</form>
</div>
</div>
</body>
</html>
