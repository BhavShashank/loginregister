<?php 
include 'core/init.php'; 
protected_page();
include 'includes/overall/header.php';
?>
	<h1>Member List</h1>
	<table>
		<tr>
			<th>
				Username
			</th>
			<th>
				First Name
			</th>
			<th>
				Last Name
			</th>
		</tr>
		<tr>
			<?php 
				$members_info = member_list();
				while($member_profile_info = mysql_fetch_array($members_info)) { 
					echo '<tr><td><a href="' . $member_profile_info['username'] . '">' . $member_profile_info['username'] . '</a></td><td>' . $member_profile_info['first_name'] . '</td><td>' . $member_profile_info['last_name'] . '</td></tr>';
				}
			?>
		</tr>
	</table>
	
<?php include 'includes/overall/footer.php'; ?>