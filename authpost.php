<?php
session_start();
ini_set('display_errors','On');
error_reporting('E_ALL');
require_once "connect.php";	// Подключаем контроллер для работы с БД
	if (isset($_POST["login"]) && isset($_POST["password"])) {
		$login = htmlspecialchars($_POST["login"]);
		$password = htmlspecialchars($_POST["password"]);
			if($login == ""){
				$success = false;
				echo "<span style='color:red;'>No value entered in fields 'Login'</span>";
				echo "<script>reLoadDoc();</script>";
			}
					elseif($password == ""){
						$success = false;
						echo "<span style='color:red;'>No value entered in field 'Password'</span>";
						echo "<script>reLoadDoc();</script>";
					}
							elseif(checkExistLogin($login)== false){
								$success = false;
								echo "<span style='color:red;'>You entered invalid login</span>";
								echo "<script>reLoadDoc();</script>";
							}
									elseif(checkPassword($login, $password)== false){
										$success = false;
										echo "<span style='color:red;'>You entered the wrong password</span>";
										echo "<script>reLoadDoc();</script>";
									}
											else{
												foreach(authUser($login) as $user){
													echo '<span style="font-size:1.25em;">Hello, </span>'.'<span style="font-size:1.25em;color:yellow">'.$user->name.'</span><br/>';
													if(isset($_COOKIE['cookie_login']) && isset($_COOKIE['cookie_password'])){
														echo "<br/>You remebered as ".$_COOKIE['cookie_login'];
														echo "<br/><a style='color:white' href='logout.php'>Logout</a>";
													}
												}
											}						
	}
?>
