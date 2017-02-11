<?php 
include 'core/init.php'; 
logged_in_redirect();
include 'includes/overall/header.php'; ?>
	<h1>Recover</h1>
	<?php 
		if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
			echo 'Thanks we have sent an email to recover your account with instructions.';
		} else {
			$mode_allowed = array('username', 'password');
			if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
				if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
					if (email_exists($_POST['email']) === true) {
						recover($_GET['mode'], $_POST['email']);
						header('location: recover.php?success');
						exit();
					} else {
						echo '<p>Oops we couldn\'t found that email address';
					}
				}
			?>
				<form action="" method="post">
					<ul>
						<li>
							Please Enter your Email Address <br />
							<input type="text" name="email">
						</li>
						<li>
							<input type="submit" value="Recover">
						</li>
					</ul>
				</form>
			<?php	
			} else {
				header('location: index.php');
				exit();
			}
		}
	include 'includes/overall/footer.php'; 
?>