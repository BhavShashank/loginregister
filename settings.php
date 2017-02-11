<?php 
include 'core/init.php'; 
protected_page();
include 'includes/overall/header.php';
if (empty($_POST) === false) {
	$required_fields = array('first_name' , 'email');
		foreach ($_POST as $key => $value) {
			if (empty($value) && in_array($key, $required_fields) === true) {
				$error[] = 'Fields marked with * are required';
				break 1;
			}
		}
	if (empty($error) === true) {
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$error[] = 'Valid Email Addres is required';
		} else if (email_exists( $_POST['email']) === true && $user_data['email'] !== $_POST['email']) {
			$error[] =  '`<b>' .$_POST['email'] .'</b>` is already in use. Please use a different email address';
		}
	}
}
?>
	<h2>Settings</h2>
	<?php 
		if (isset($_GET['success']) && empty($_GET['success'])) {
			echo 'User settings have been succesfully updated.';
		} else {
			 if (empty($_POST) === false && empty($error) === true) {
				$update_data = array(
					'first_name'	=> $_POST['first_name'],
					'last_name'		=> $_POST['last_name'],
					'email'			=> $_POST['email'],
					'allow_email'	=> ($_POST['allow_email'] == 'on') ? 1 : 0
					);
				update_user($session_user_id, $update_data);
				header('location: settings.php?success');
				exit();
			} else if(empty($error) === false) {
				echo output_error($error);
			}
		?>
			<form action="" method="post">
				<ul>
					<li>
						First Name* <br />
						<input type="text" name="first_name" value="<?php echo $user_data['first_name']; ?>">
					</li>
					<li>
						Last Name <br />
						<input type="text" name="last_name" value="<?php echo $user_data['last_name']; ?>">
					</li>
					<li>
						Email* <br />
						<input type="text" name="email" value="<?php echo $user_data['email']; ?>">
					</li>
					<li>
						<input type="checkbox" name="allow_email" <?php if($user_data['allow_email'] == 1) { echo 'checked=check'; } ?>> Want to hear from us?
					</li>
					<li>
						<input type="submit" value="Update">
					</li>
				</ul>
			</form>
<?php
	}
	include 'includes/overall/footer.php'; 
?>