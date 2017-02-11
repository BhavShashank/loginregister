<?php
	function email($to, $subject, $body) {
		mail($to, $subject, $body, 'From: something@yourdomain.com');
	}
	function logged_in_redirect() {
		if (logged_in() === true) {
			header('location: index.php');
			exit();
		}
	}
	function protected_page() {
		if (logged_in() === false) {
			header('location: protected.php');
			exit();
		}
	}
	function admin_protect() {
		global $user_data;
		if (has_access($user_data['user_id'], 1) === false) {
			header('location: index.php');
			exit();
		}
	}
	function array_sanitize(&$item) {
		$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
	}
	function sanitize($data) {
		return htmlentities(strip_tags(mysql_real_escape_string($data)));
	}
	function output_error($error) {
		return ('<ul><li>' . implode('</li><li>', $error) . '</li></ul>');
	}
?>
