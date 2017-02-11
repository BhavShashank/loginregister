<?php 
include 'core/init.php'; 
include 'includes/overall/header.php';
	if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
		$username = $_GET['username'];
		if (user_exists($username) === true ) {
		$user_id = user_id($username);
		$profile_data = user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'profile');
		?>
			<h1><?php echo $profile_data['first_name']; ?>'s Profile</h1>
			<p><img src ="<?php echo $profile_data['profile']; ?>" width="20%"></p>
			<p>Username: <?php echo $profile_data['username']; ?></p>
			<p>First Name: <?php echo $profile_data['first_name']; ?></p>
			<?php 
				if (!empty($profile_data['last_name'])) {
			?>
			<p>Last Name: <?php echo $profile_data['last_name']; ?></p>
			<?php
			}
			if (logged_in() === true) {
				if ($session_user_id === $user_id) {
			?>
				<p>Email: <?php echo $profile_data['email']; ?></p>
			<?php	
				}
			}
		?>
		<?php
		} else {
			echo 'User doesn\'t exists';
		}
	} else {
		header('location: index.php');
		exit();
	}
include 'includes/overall/footer.php'; ?> 