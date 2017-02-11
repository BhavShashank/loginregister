<div class="widget">
	<h2>Hello <?php echo $user_data['first_name']; ?>!</h2>
	<div class="inner">
		<div class="profile">
			<?php 
				if (isset($_FILES['profile']) === true) {
					if (empty($_FILES['profile']['name']) === true) {
						echo 'Please choose a file';
					} else {
						$allowed = array('jpg', 'png', 'jpeg', 'gif');
						$file_name = $_FILES['profile']['name'];
						$file_extn = strtolower(end(explode('.', $file_name)));
						$file_temp = $_FILES['profile']['tmp_name'];
						if (in_array($file_extn, $allowed) === true) {
							change_profile_image($session_user_id, $file_temp, $file_extn);
							header('Location: ' . $current_file);
							exit();
						} else {
							echo 'incorrect file format. Allowed: ';
							echo implode(', ', $allowed);
						}
					}
				}
				if (empty($user_data['profile']) === false) {
					echo '<img src="' . $user_data['profile'] . '" alt="' . $user_data['first_name'] . '"Profile Image>';
				}
			?>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" name="profile"> <br />
				<input type="submit">
			</form>
		</div>
		<ul>
			<li>
				<a href="<?php echo $user_data['username'] ?>">Profile</a>
			</li>			
			<li>
				<a href="settings.php">Settings</a>
			</li>
			<li>
				<a href="changepassword.php">Change Password</a>
			</li>
			<li>
				<?php if(has_access($session_user_id, 1) === true) { ?><a href="mail.php">Mass Mail</a> <?php } ?>
			</li>
			<li>
				<a href="logout.php">Logout</a>
			</li>
		</ul>
	</div>
</div>
