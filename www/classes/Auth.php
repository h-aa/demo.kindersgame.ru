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
		$mysqli 			            = new mysqli(DBHOST, DBUSER, DBPASS, DBBASE);
		if($mysqli->connect_errno)
		{
			echo "Ошибка: " . $mysqli->connect_error . "\n";
			exit();
		}
		$mysqli->set_charset("utf8");
		$this->mysql                    = $mysqli;		
	}
	public function userLogout()
	{
		session_destroy();
	}

	public function userLogin($u_login, $u_password)
	{
		$u_login 			            = $this->mysql->real_escape_string($u_login);
		$u_password 		            = $this->mysql->real_escape_string($u_password);
		$user_password_hash             = sha1(SALT . $u_password);
		$query 				            = "SELECT * FROM `users` WHERE `u_login` = '".$u_login."' AND `u_password` = '".$user_password_hash."' AND `u_active` = '1'";
        $result				            = $this->mysql->query($query);
		if($result->num_rows === 0)
		{
			return false;
		} else {
			$user_data 				    = $result->fetch_array();
			$_SESSION['is_login'] 	    = true;
			$_SESSION['user_id']	    = $user_data['u_id'];
            $_SESSION['user_type']      = $user_data['u_type'];
			return true;
		}
	}

	public function isLogin()
	{
		if(isset($_SESSION['is_login']))
		{
			$this->is_login             = true;
		}
		return $this->is_login;
	}

	public function isAdmin()
	{
		if(!isset($_SESSION['is_login']))
		{
			return $this->is_admin;
			//exit();
		}
		$query				            = "SELECT * FROM `admins` WHERE `user_id` = '".$_SESSION['user_id']."'";
		$result 			            = $this->mysql->query($query);
		if($result->num_rows > 0)
		{
			$this->is_admin             = true;
		}
		return $this->is_admin;
	}

	public function userRights($user_right, $user_id = false)
	{
        if(!$this->isLogin())
        {
            return false;
        }
		$user_id				        = $user_id ? $user_id : $_SESSION['user_id'];
		$user_id 			            = $this->mysql->real_escape_string($user_id);
		$user_right				        = $this->mysql->real_escape_string($user_right);
		$query				            = "SELECT * FROM `users_right` WHERE `ur_u_id` = '".$user_id."' AND `ur_r_id` = '".$user_right."'";
		$result				            = $this->mysql->query($query);
		if($result->num_rows > 0)
		{
			return true;
		} else {
			return false;
		}
	}
}
