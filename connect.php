<?php
	$db = 'db/users.xml';
	if (!file_exists($db)) { // Создаем файл БД при его отсутствии
		newXml();
	}
	function newXml(){	// Функция для создания базы данных						
		$dom = new domDocument("1.0", "utf-8");  
		$root = $dom->createElement("users");
		$dom->appendChild($root);
		$dom->save("db/users.xml");
	}
	function regUser($login, $password, $email, $name, $salt){
		$xmlFile = __DIR__."/db/users.xml"; // Подключаемся
		$xml = new SimpleXMLElement($xmlFile, NULL, TRUE);
		$count_id = $xml->xpath("//user[@id]"); 
		$count_id = count($count_id)+1; // Определяем для следуюей записи, следующий порядковый номер атрибута ID 
		$dom = new DomDocument();
		$dom->load("db/users.xml");	// Работаем с БД	
		$xpath = new DOMXPath ($dom); 
	    $parent = $xpath->query ('//users');  
	    $next = $xpath->query ('//users/user'); 
	    $new_user = $dom->createElement ('user'); // Создаем новую запись 
		$user_attribute = $dom->createAttribute('id'); // с полученным 
		$user_attribute->value = $count_id; // ранее атрибутом
		$new_user->appendChild($user_attribute);  // и добавляем
		$dom->appendChild($new_user); 
	    $new_log = $dom->createElement ('login', $login); 
		$password = md5($salt.$password);
	    $new_pass = $dom->createElement ('password', $password);
	    $new_email = $dom->createElement ('email', $email);
	    $new_name = $dom->createElement ('name', $name);
	    $new_salt = $dom->createElement ('salt', $salt);
	    $new_user->appendChild ($new_log);
	    $new_user->appendChild ($new_pass);
	    $new_user->appendChild ($new_email);
	    $new_user->appendChild ($new_name);
	    $new_user->appendChild ($new_salt);
	    $parent->item(0)->insertBefore($new_user, $next->item($count_id));
	    $dom->save("db/users.xml"); // сохраняем данные
	}
	function checkLogin($login){ // Проверка на существование Логина перед регистрацией нового пользователя
		$xmlFile = __DIR__."/db/users.xml";
		$xml = new SimpleXMLElement($xmlFile, NULL, TRUE);
		$check_login = $xml->xpath("//user[login/text()='{$login}']");
		if (!empty($check_login)){
		$check_result = false; 
		return $check_result;} 
		else{ 
		$check_result = true; 
		return $check_result;
		}
	}	
	function checkEmail($email){ // Проверка на существование адреса электропочты
		$xmlFile = __DIR__."/db/users.xml";
		$xml = new SimpleXMLElement($xmlFile, NULL, TRUE);
		$check_email = $xml->xpath("//user[email/text()='{$email}']");
		if (!empty($check_email)){
		$check_result = false; 
		return $check_result;} 
		else{ 
		$check_result = true; 
		return $check_result;
		}
	}
	function authUser($login){ // Аутентификация пользователя
		$xmlFile = __DIR__."/db/users.xml";
		$xml = new SimpleXMLElement($xmlFile, NULL, TRUE);
		$check_user = $xml->xpath("//user[login/text()='{$login}']");
		return $check_user;
	}
	function checkExistLogin($login){ // Проверка на сущетвование Логина перед аутентифкацией
		$xmlFile = __DIR__."/db/users.xml";
		$xml = new SimpleXMLElement($xmlFile, NULL, TRUE);
		$check_exist_login = $xml->xpath("//user[login/text()='{$login}']");
		if (empty($check_exist_login)){
		$check_result = false; 
		return $check_result;} 
		else{ 
		$check_result = true; 
		return $check_result;
		}
	}
	function returnSalt($login){
		$xmlFile = __DIR__."/db/users.xml";
		$xml = new SimpleXMLElement($xmlFile, NULL, TRUE);
		$choose_user = $xml->xpath("//user[login/text()='{$login}']");
		return $choose_user;
	}
	function checkPassword($login, $password){ // Проверка соответствия паролей
		$xmlFile = __DIR__."/db/users.xml";
		$xml = new SimpleXMLElement($xmlFile, NULL, TRUE);
		foreach(returnSalt($login) as $user){
		$salt = $user->salt;
		}
		$password = md5($salt.$password); // Хэш пароля с "солью"
		$check_pass = $xml->xpath("//user[login/text()='{$login}' and password/text()='{$password}']");
		$_SESSION["login"] = $login; // Записываем Логин в сессию
		if($_REQUEST['remember']){ // и в куки при отметке в чекбоксе формы аутентификации
			setcookie('cookie_login', $login, strtotime('+10 days'), '/');
			$_COOKIE['cookie_login'] = $login;
		}
		if (empty($check_pass)){
		$check_result = false; 
		return $check_result;
		} 
			else{ 
				$check_result = true; 
				return $check_result;
			}
	}
	function generateSalt() { // Генератор "соли"
		$salt = '';
		$length = rand(5,10);
		for($i=0; $i<$length; $i++) {
		$salt .= chr(rand(33,126));
		}
    return $salt;
	}
	$salt = generateSalt();
?>