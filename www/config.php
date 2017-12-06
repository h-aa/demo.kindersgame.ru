<?php
define("DBHOST", "localhost");
define("DBBASE", "sofia_kg");
define("DBUSER", "sofia_kg");
define("DBPASS", "WrLHyR9DePHypNTj");
define("SALT",  "KLJAHSKDH&*^kasnhl");
define("COMMENTLIMIT", "5");
//Данные для смс
define("SMSC_LOGIN", "tklient.ru");			// логин клиента
define("SMSC_PASSWORD", "Aq1sw2de3");	    // пароль или MD5-хеш пароля в нижнем регистре
define("SMSC_POST", 0);					    // использовать метод POST
define("SMSC_HTTPS", 0);				    // использовать HTTPS протокол
define("SMSC_CHARSET", "utf-8");	        // кодировка сообщения: utf-8, koi8-r или windows-1251 (по умолчанию)
define("SMSC_DEBUG", 0);				    // флаг отладки
define("SMTP_FROM", "info@tklient.ru");     // e-mail адрес отправителя
date_default_timezone_set("Europe/Moscow");
//ini_set('error_reporting', 'E_ALL ^ E_NOTICE');
?>
