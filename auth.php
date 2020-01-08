<?phpsession_start();?>
<html>
	<?php require_once "header.php";?>
	<body>
		<div class="form-regauth">
			<form id="auth">
				<h2>Authorisation</h2>
				<table class="regauth">
					<tr>
						<td class="regauth-td">Login</td>
						<td class="regauth-td">
							<input type="text" name="login">
						</td>
					</tr>
					<tr>
						<td class="regauth-td">Password</td>
						<td class="regauth-td">
							<input type="text" name="password">
						</td>
					</tr>
					<tr>
						<td class="regauth-td">Remember</td>
						<td class="regauth-td">
							<input type="checkbox" name="remember">
						</td>
					</tr>
					<tr>
						<td class="regauth-td" colspan="2" align="right">
							<input type="submit" value="Log in">
						</td>
					</tr>
				</table>
			</form>
		</class>
		<div id="my_message"></div>
	</body>
	<script type="text/javascript" src="js/scripts.js"></script>
</html>
