<div class="widget">
	<h2>Login/Resgister</h2>
	<div class="inner">
		<form action="login.php" method="post">
			<ul id="login">
				<li>
					Username <br />
					<input type="text" name="username">
				</li>
				<li>
					Password <br />
					<input type="password" name="password"> 
				</li>
				<li>
					<input type="submit" value="Login"> 
				</li>
				<li>
					<a href="register.php">Register</a>
				</li>
				<li>
					Forgot <a href="recover.php?mode=username">Username</a> or <a href="recover.php?mode=password">Password</a>?
				</li>
			</ul>
		</form>
	</div>
</div>
