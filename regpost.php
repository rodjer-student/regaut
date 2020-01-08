<?php
session_start();
require_once "connect.php"; // Подключаем контроллер для работы с БД
if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]) && isset($_POST["email"]) && isset($_POST["name"])) {
		$login = htmlspecialchars($_POST["login"]);
		$password = htmlspecialchars($_POST["password"]);
		$confirm_password = htmlspecialchars($_POST["confirm_password"]);
		$email = htmlspecialchars($_POST["email"]);
		$name = htmlspecialchars($_POST["name"]); 
		if($login == "" or $password =="" or $confirm_password == "" or $email == "" or $name == ""){
			$success = false;
			echo "<span style='color:red;'>You entered nothing in one or more fields</span>";
		}
				elseif(checkLogin($login)== false){
					$success = false;
					echo "<span style='color:red;'>The same Login has already exists</span>";
				}
						elseif(checkEmail($email)== false){
							$success = false;
							echo "<span style='color:red;'>The same E-mail has already exists</span>";
						}
								elseif($password != $confirm_password){ 
									$success = false;
									echo "<span style='color:red;'>The entered passwords don't match</span>";
								}
										else {
											$success = regUser($login, $password, $email, $name, $salt);
											if(!$success) echo "<span style='color:aqua;'>Registration was successful</span>";
										}
						
}
?>	