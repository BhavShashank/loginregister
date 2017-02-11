<?php 
include 'core/init.php'; 
logged_in_redirect();
include 'includes/overall/header.php'; 
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
		?>
		<h2>Account Activated</h2>
		<p>Your account is now activated. You can now login.</p>
		<?php
		} else if (isset($_GET['email'], $_GET['email_code']) === true) {
	$email = trim($_GET['email']);
	$email_code = trim($_GET['email_code']);
	if (email_exists( $email ) === false) {
		$error[] = 'Oops something went wrong. We couldn\'t found that mail address';
	} else if (activate($email, $email_code) === false) {
		$error[] = 'Problem activating your account. Please contact support team';
	}
	if (empty($error) === false) {
	?>
		<h2>Oops...</h2>
	<?php
		echo output_error($error);
	} else {
		header('location: activate.php?success');
		exit();
	}
} else {
	header('location: index.php');
	exit();
}
include 'includes/overall/footer.php'; 
?>