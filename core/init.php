<?php 
	session_start();
	error_reporting(0);
	require 'database/connect.php';
	require 'functions/genral.php';
	require 'functions/users.php';
	$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
	$current_file = end($current_file);
	if (logged_in() === true) {
		$session_user_id = $_SESSION['user_id'];
		$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email', 'type', 'allow_email', 'profile');
		if (user_active($user_data['username']) === false) {
			session_destroy();
			header('location: index.php');
			exit();
		}
	}
	$error = array();
?>
