<?php 
	include 'core/init.php';
	logged_in_redirect();
	include 'includes/overall/header.php'; 
	if (empty($_POST) === false) {
		$required_fields = array('username', 'password', 'password_repeast', 'first_name' , 'email');
		foreach ($_POST as $key => $value) {
			if (empty($value) && in_array($key, $required_fields) === true) {
				$error[] = 'Fields marked with * are required';
				break 1;
			}
		}
		if (empty($error) === true) {
			if (user_exists($_POST['username']) === true) {
				$error[] = 'Username `<b>' . $_POST['username'] . '</b>` is already taken';
			}
			if (preg_match("/\\s/",$_POST['username'] == true )) {
				$error[] = 'Username can\'t contain space';
			}
			if (strlen($_POST['password']) <= 6) {
				$error[] = 'Your password must be 6 character long.';
			}
			if ($_POST['password'] !== $_POST['password_repeat']) {
				$error[] = 'Your password doesn\'t match';
			}
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
				$error[] = 'Valid Email Addres is required';
			}
			if (email_exists( $_POST['email'] ) === true) {
				$error[] =  '`<b>' .$_POST['email'] .'</b>` is already in use. Please use a different email address';
			}
		}
	}
?>
	<h1>Register</h1>
	<?php 
		if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
			echo 'User has been succesfully registered! Please check your email or spam folder to activate your account.';
		} else {
			if (empty($_POST) === false && empty($error) === true) {
				$register_data = array(
				'username' 	=> $_POST['username'],
				'password' 	=> $_POST['password'],
				'first_name'=> $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'email' 	=> $_POST['email'],
				'email_code'=> md5($_POST['username']+microtime())
				);
				register_user($register_data);
				header('location: register.php?success');
				exit();
			} else if ( empty($error) === false ) {
				echo output_error($error);
			}
	?>
			<form action="" method="post">
				<ul>
					<li>
						Username* <br />
						<input type="text" name="username">
					</li>
					<li>
						Password* <br />
						<input type="password" name="password">
					</li>
					<li>
						Repeat Password* <br />
						<input type="password" name="password_repeat">
					</li>
					<li>
						First Name* <br />
						<input type="text" name="first_name">
					</li>
					<li>
						Last Name <br />
						<input type="text" name="last_name">
					</li>
					<li>
						Email* <br />
						<input type="text" name="email">
					</li>
					<li>
						<input type="submit" value="Register">
					</li>
				</ul>
			</form>
<?php 
			}
	include 'includes/overall/footer.php'; ?>