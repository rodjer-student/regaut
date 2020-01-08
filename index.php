<html>
	<?php require_once "header.php";?>
	<body>
		<div class = "container">
			<a href="auth.php" class="button" target = "blank">Authorization</a>
			<br/><br/>
			<a href="reg.php" class="button" target = "blank">Registration</a>
		<p>
		<?php
			session_start();
			if(isset($_COOKIE['cookie_login']) && isset($_COOKIE['cookie_password'])){
				echo "You logged as ".$_COOKIE['cookie_login'];
			}
			else echo "You entered as unknown user";
		?>
		</p>
		<a href="logout.php" class="button">Logout</a>
		</class>
	</body>
</html>