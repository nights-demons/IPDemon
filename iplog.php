
<!DOCTYPE html>
<html>
<head>
	<title>Админ панель:</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Админка</h1><hr/>
	<b>Инструкцию по использовании этого айпи логгера вы найдёте на форуме white-haker.ru</b><br>
	<p>Форум: </p><a href="https://white-haker.ru">WHAK.RU</a>
	<hr/>
	<h2>RESULT.LOG</h2>
	<div class="content">
		<?php

		$login = 'admin@nights-demons.ru';
		$pass = 'H1V1';

		if($_GET['login'] == $login and $_GET['password'] == $pass){
			$f = fopen('r.log', 'r');
			while (!feof($f)) {
				echo fgets($f)."<br>";
			}
			fclose($f);
		} else{
			echo '<h1 style="color: red;">Пароль или логин не верные!</h1>';
			header('Location: http://t.me/nights_demons');
		};

		?>
	</div>
	<br>
	<a href="https://t.me/nights_demons"><h3>(c) Айпи Логгер пренадлежит каналу Ночные Демоны<h3></a>
	<br>
<hr/>
</body>
</html>