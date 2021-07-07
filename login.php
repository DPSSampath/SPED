<?php ob_start(); ?>
<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>

<?php 
	// check for form submission
	if (isset($_POST['submit'])) {

		$errors = array();

		// check if the username and password has been entered
		if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
			$errors[] = 'Username is Missing / Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
			$errors[] = 'Password is Missing / Invalid';
		}

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$email 		= mysqli_real_escape_string($connection, $_POST['email']);
			$password 	= mysqli_real_escape_string($connection, $_POST['password']);
			$hashed_password = sha1($password);

			// prepare database query
			$query = "SELECT * FROM users 
						WHERE email = '{$email}' 
						AND password = '{$hashed_password}' 
						LIMIT 1";
						
			$result_set = mysqli_query($connection, $query);
			
			print_r($result_set);

			if ($result_set) {
				// query succesfful
				if (mysqli_num_rows($result_set) == 1) {
				
				// valid user found
				$users = mysqli_fetch_assoc($result_set);
				$_SESSION['users_id']  = $users['id'];
				$_SESSION['last_name'] = $users['last_name'];

				// redirect to users.php
					header('Location: Dashboard.php');
				} else {
				
				// user name and password invalid
					$errors[] = 'Invalid Username / Password';
				}
			} else {
				$errors[] = 'Database query failed';
			}
		}
	}
	
	ob_end_flush();
?>

	<?php
		// Updating last login
		$query = "UPDATE users SET last_login = NOW() ";
	
		$result_set = mysqli_query($connection, $query);

		if (!$result_set) {
			die("Database query failed.");
		}
	?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	
	<title>Login</title>

	<link rel="stylesheet" href="style-login.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1./js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="" type="text/css" href="index.php">
	<link rel="" type="text/css" href="Dashboard.php">

</head>
<body>

	<!----------------LoginBox Section------------------>

<section id="login-box">
	<div class="container">
		<div class="login-box">
			<img src="img\User.png" class="user">

		<?php
		if (isset($_GET['logout'])) {
			echo '<p class"info"> Logout succesfful</p>';
		}
	?>
			<h2>Log In Here</h2>
			<form action="login.php" method="POST" onsubmit="return validateForm()";>
														
	<?php
		if (isset($errors) && !empty($errors)) {
			echo '<p class"error"> Invalid Username / Password </p>';
		}
	?>
		<br>
				<p>Username</p>
				<input type="text" name="email" id="email" placeholder="Your e-mail Address" autofocus required>

				<p>Password</p>
				<input type="password" name="password" id="password" placeholder="Your Password" required>

				<button type="submit" name="submit" value="signIn" class="btn-submit">Sign In</button><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.php">Forgot Password?</a>
				<!--<a href="index.html"><button type="button" class="home">Home</button></a>-->
			</form>
		</div> <!-------login-box-------->
	</div> <!-------container-------->
</section>

<script>
	function validateEmail(email) {
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}

var userEmail = document.getElementById("email");

function validateForm() {
	var isValidEmail = validateEmail(userEmail.value);
	return isValidEmail;
}
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S89ZT85TDL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S89ZT85TDL');
</script>

</body>
</html>
<?php mysqli_close($connection); ?>
