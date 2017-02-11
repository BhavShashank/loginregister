<?php 
include 'core/init.php'; 
include 'includes/overall/header.php'; ?>
	<h1>Home</h1>
	<?php
		if (has_access($session_user_id, 1) === true) {
			echo 'Hello, Admin '. $user_data['username'];
		} else if (has_access($session_user_id, 2) === true) {
			echo 'Hello, Moderator '. $user_data['username'];
		} else {
			echo '<p>Just a template</p>';
		}
	?>
<?php include 'includes/overall/footer.php'; ?>