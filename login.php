<?php 
	include 'core/init.php';
	logged_in_redirect();	
	if (empty($_POST) === false) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (empty($username) === true || empty($password) === true) {
			$error[] = 'You need to enter a username or password';
		} else if ( user_exists($username) === false ) {
			$error[] = "No user with this username found";
		} else if (user_active($username) ===  false) {
			$error[] = "You haven't activated your account";
		} else {
			if (strlen($password) > 32) {
				$error[] = "Password is too long";
			}
			$login = login($username, $password);
			if ($login === false) {
				$error[] = 'This username/password combination is incorrect';
			}
			else {
				$_SESSION['user_id'] = $login;
				header('location: index.php');
				exit();
			}
		}
	}
	include 'includes/overall/header.php';
	if (empty($error) === false) {
	?>
	<h2>We try to log you in but...</h2>
	<?php
		echo output_error($error);
	}	
	include 'includes/overall/footer.php';
?>