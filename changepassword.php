<?php 
include 'core/init.php'; 
protected_page();
if (empty($_POST) === false) {
	$required_fields = array('current_password', 'password', 'password_again');
	if (empty($_POST) === false) {
		$required_fields = array('username', 'password', 'password_repeast', 'first_name' , 'email');
		foreach ($_POST as $key => $value) {
			if (empty($value) && in_array($key, $required_fields) === true) {
				$error[] = 'Fields marked with * are required';
				break 1;
			}
		}
	}
	if (md5($_POST['current_password']) === $user_data['password'] ) {
		if (trim($_POST['password']) !== trim($_POST['password_again'])) {
			$error[] = 'Your new password didn\'t match';
		} else if (strlen($_POST['password']) <= 6) {
			$error[] = 'Your password must be 6 character long.';
		}
	} else {
		$error[] = 'Your current password is incrorrect';
	}
}
include 'includes/overall/header.php'; ?>
	<h1>Change Password</h1>
	<?php 
	if (isset($_GET['success']) && empty($_GET['success'])) {
			echo 'You password has been changed successfully!';
	} else {
		if(empty($_POST) === false && empty($error) === true) {
			change_password($session_user_id, $_POST['password']);
			header('location: changepassword.php?success');
		} else if (empty($error) === false) {
			echo output_error($error);
		} {

		}
	?>
		<br />
		<form method="post">
			<ul>
				<li>
					Current Password* <br />
					<input type="password" name="current_password">
				</li>
				<li>
					New Password* <br />
					<input type="password" name="password">
				</li>
				<li>
					New Password Again* <br />
					<input type="password" name="password_again">
				</li>
				<li>
					<input type="submit" value="Change Password">
				</li>
			</ul>
		</form>	
<?php 
	}
include 'includes/overall/footer.php'; ?>