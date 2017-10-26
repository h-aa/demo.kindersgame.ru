<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
class MainController
{
    private $help;
    private $model;
    private $auth;
    private $action;

    public function __construct()
    {
	    $this->help 	= new Help;
	    $this->model 	= new MainModel();
	    $this->auth 	= new Auth();
    }

    public function schedule()
    {	
	    $this->help->action = 'schedule';
	    require_once("views/schedule.php");
    }

    public function login()
    {
        $this->help->action = 'login';
        
        if($this->auth->isLogin())
        {
            header('Location: /');
            exit();
        }
        if(!$_POST)
        {
            require_once('views/login.php');
            exit();
        }

        if(!$_POST['user_name'])
        {
            $this->help->error[] = 'Не указано имя пользователя';
        }
        if(!$_POST['user_password'])
        {
            $this->help->error[] = 'Не указан пароль';
        }
        if($_POST['user_name'] && $_POST['user_password'])
        {
            if(!$this->auth->userLogin($_POST['user_name'], $_POST['user_password']))
            {
                $this->help->error[] = 'Не верный логин или пароль';
            }
        }

        if($this->help->error)
        {
            require_once('views/login.php');
            exit();            
        } else {
            header('Location: /');
            exit();            
        }
    }

    public function logout()
    {
        if($this->auth->isLogin())
        {
            $this->auth->userLogout();
        }
        header('Location: /');
    }

    public function error()
    {
	    require_once("views/error.php");
    }

    public function teacher_add()
    {
        $this->help->action = 'teacher_add';
        if(!$this->auth->isAdmin())
        {
            header('Location: /');
            exit();
        }
        
        require_once("views/teacher_add.php");
    }
}
?>