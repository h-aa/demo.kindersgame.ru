<?php
/**
* Класс авторизации и проверки прав пользовтелей
* Данные хранятся в трёх таблицах: users (таблица пользователей), admins (id пользователей которые являются админами), rights (права остальных пользователей если это необходимо)
*/
class Auth
{
	
	private $is_login = false;
	private $is_admin = false;
	private $mysql;
	function __construct()
	{
		$mysqli 			              = new mysqli(DBHOST, DBUSER, DBPASS, DBBASE);
		if($mysqli->connect_errno)
		{
			echo "Ошибка: " . $mysqli->connect_error . "\n";
			exit();
		}
		$mysqli->set_charset("utf8");
		$this->mysql                = $mysqli;		
	}
	public function userLogout()
	{
		session_destroy();
	}

	public function userLogin($user_name, $user_password)
	{
		$user_name 			            = $this->mysql->real_escape_string($user_name);
		$user_password 		            = $this->mysql->real_escape_string($user_password);
		$user_password_hash             = sha1(SALT . $user_password);
		$query 				            = "SELECT * FROM `users` WHERE `user_name` = '".$user_name."' AND `user_password` = '".$user_password_hash."' AND `active` = '1'";
        $result				            = $this->mysql->query($query);
		if($result->num_rows === 0)
		{
			return false;
		} else {
			$user_data 				    = $result->fetch_array();
			$_SESSION['is_login'] 	    = true;
			$_SESSION['user_id']	    = $user_data['user_id'];
			return true;
		}
	}

	public function isLogin()
	{
		if(isset($_SESSION['is_login']))
		{
			$this->is_login           = true;
		}
		return $this->is_login;
	}

	public function isAdmin()
	{
		if(!isset($_SESSION['is_login']))
		{
			return $this->is_admin;
			exit();
		}
		$query				              = "SELECT * FROM `admins` WHERE `user_id` = '".$_SESSION['user_id']."'";
		$result 			              = $this->mysql->query($query);
		if($result->num_rows > 0)
		{
			$this->is_admin               = true;
		}
		return $this->is_admin;
	}

	public function userRights($user_right, $user_id = false)
	{
		$user_id				            = $user_id ? $user_id : $_SESSION['user_id'];
		$user_id 			                = $this->mysql->real_escape_string($user_id);
		$user_right				            = $this->mysql->real_escape_string($user_right);
		$query				                = "SELECT * FROM `rights` WHERE `user_id` = '".$user_id."' AND `user_right` = '".$user_right."'";
		$result				                = $this->mysql->query($query);
		if($result->num_rows > 0)
		{
			return true;
		} else {
			return false;
		}
	}
}
