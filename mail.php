<?php 
include 'core/init.php'; 
protected_page();
admin_protect();
include 'includes/overall/header.php'; ?>
	<h1>Mail Users</h1>
	<?php 
	if (isset($_GET['success']) === true && empty($_GET['success'])) {
		echo 'Email has been sent';
	} else {
			if (empty($_POST) === false) {
				if (empty($_POST['subject']) === true) {
					$error[] = 'Subject can\'t be empty';
				} 
				if (empty($_POST['body']) === true) {
					$error[] = 'Body can\'t be empty';
				}
				if (empty($error) === false) {
					echo output_error($error);
				} else {
					mail_users($_POST['subject'], $_POST['body']);
					header('location: mail.php?success');
					exit();
				}
			}
			?>
			<form action="" method="post">
				<ul>
					<li>
						Subject* <br />
						<input type="text" name="subject">
					</li>
					<li>
						Body* <br />
						<textarea name="body"></textarea>
					</li>
					<li>
						<input type="submit" value="Send">
					</li>
				</ul>
			</form>	
<?php 
	}
	include 'includes/overall/footer.php'; ?>