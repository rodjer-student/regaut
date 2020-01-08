<?phpsession_start();?>
<html>
	<?php require_once "header.php";?>
	<body>
		<div class="form-regauth">
			<form id="reg">
				<h2>Registration</h2>
				<table class="regauth">
					<tr class="">
						<td class="regauth-td">Login</td>
						<td class="regauth-td">
							<input type="text" name="login">
						</td>
					</tr>
					<tr>
						<td class="regauth-td">Password</td>
						<td class="regauth-td">
							<input type="password" name="password">
						</td>
					</tr>
					<tr>
						<td class="regauth-td">Confirm Password</td>
						<td class="regauth-td">
							<input type="password" name="confirm_password">
						</td>
					</tr>
					<tr>
						<td class="regauth-td">Email</td>
						<td class="regauth-td">
							<input type="email" name="email">
						</td>
					</tr>
					<tr>
						<td class="regauth-td">Name</td>
						<td class="regauth-td">
							<input type="text" name="name">
						</td>
					</tr>
					<tr>
						<td class="regauth-td" colspan="2" align="right">
							<input type="submit" value="Sign up">
						</td>	
					</tr>
				</table>
			</form>
		</class>
		<div id="my_message"></div>
	</body>
	<script type="text/javascript" src="js/scripts.js"></script>
</html>