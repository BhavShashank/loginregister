<?php
	$con_error = "Sorry we are facing a downtime.";
	$con = mysql_connect('localhost', 'root', '') or die ($con_error);
	mysql_select_db('webauth') or die($con_error);
?>
