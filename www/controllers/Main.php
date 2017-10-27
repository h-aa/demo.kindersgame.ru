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
        if(!$this->auth->isAdmin())
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'teacher_add';
        
        $t_first_name       = $_POST['t_first_name']    ? htmlspecialchars($_POST['t_first_name'])  : '';
        $t_second_name      = $_POST['t_second_name']   ? htmlspecialchars($_POST['t_second_name']) : '';
        $t_third_name       = $_POST['t_third_name']    ? htmlspecialchars($_POST['t_third_name'])  : '';
        $t_email            = $_POST['t_email']         ? htmlspecialchars($_POST['t_email'])       : '';
        $t_phone            = $_POST['t_phone']         ? htmlspecialchars($_POST['t_phone'])       : '';
        $t_comment          = $_POST['t_comment']       ? htmlspecialchars($_POST['t_comment'])     : '';
        $t_active           = $_POST['t_active']        ? htmlspecialchars($_POST['t_active'])      : '';

        if(!$_POST)
        {
            require_once("views/teacher_add.php");
            exit();
        }
        if(!$t_first_name)
        {
            $this->help->error[] = 'Не указано имя преподавателя';
        }
        if(!$t_second_name)
        {
            $this->help->error[] = 'Не указана фамилия преподавателя';
        }

		if($t_email && !filter_var($t_email, FILTER_VALIDATE_EMAIL))
		{
			$this->help->error[] = 'Неверный формат Email';
		}

        if($this->help->error)
        {
            require_once("views/teacher_add.php");
            exit();
        }

        if($this->model->addTeacher($t_first_name, $t_second_name, $t_third_name, $t_email, $t_phone, $t_comment, $t_active))
        {
            require_once("views/teacher_add_success.php");
            exit();            
        } else {
            require_once("views/teacher_add_error.php");
            exit();            
        }
    }

    public function teacher_edit()
    {
        if(!$this->auth->isAdmin())
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'teacher_edit';
        
        $t_id               = $_POST['t_id']            ? htmlspecialchars($_POST['t_id'])          : '';      
        if(!$t_id)
        {
            $teachers = $this->model->getTeachers();
            require_once('views/teacher_select.php');
            exit();
        }
        
        $teacher_data = $this->model->getTeacherData($t_id);
        
        if($teacher_data->num_rows === 0)
        {   
            $this->auth->userLogout();
            header('Location: /');
            exit();          
        }
        if($t_id && !$_POST['edit'])
        {
            $t_data = $teacher_data->fetch_assoc();
            $t_first_name       = $t_data['t_first_name'];
            $t_second_name      = $t_data['t_second_name'];
            $t_third_name       = $t_data['t_third_name'];
            $t_email            = $t_data['t_email'];
            $t_phone            = $t_data['t_phone'];
            $t_comment          = $t_data['t_comment'];
            $t_active           = $t_data['t_active'];             
        } else {
            $t_first_name       = $_POST['t_first_name']    ? htmlspecialchars($_POST['t_first_name'])  : '';
            $t_second_name      = $_POST['t_second_name']   ? htmlspecialchars($_POST['t_second_name']) : '';
            $t_third_name       = $_POST['t_third_name']    ? htmlspecialchars($_POST['t_third_name'])  : '';
            $t_email            = $_POST['t_email']         ? htmlspecialchars($_POST['t_email'])       : '';
            $t_phone            = $_POST['t_phone']         ? htmlspecialchars($_POST['t_phone'])       : '';
            $t_comment          = $_POST['t_comment']       ? htmlspecialchars($_POST['t_comment'])     : '';
            $t_active           = $_POST['t_active']        ? htmlspecialchars($_POST['t_active'])      : '';  
        }


        if(!$t_first_name)
        {
            $this->help->error[] = 'Не указано имя преподавателя';
        }
        if(!$t_second_name)
        {
            $this->help->error[] = 'Не указана фамилия преподавателя';
        }

        if($t_email && !filter_var($t_email, FILTER_VALIDATE_EMAIL))
        {
            $this->help->error[] = 'Неверный формат Email';
        }

        if($this->help->error)
        {
            require_once("views/teacher_edit.php");
            exit();
        }
        
        if(!$_POST['edit'])
        {
            require_once("views/teacher_edit.php");
            exit();
        }

        if($this->model->editTeacherData($t_id, $t_first_name, $t_second_name, $t_third_name, $t_email, $t_phone, $t_comment, $t_active))
        {
            require_once("views/teacher_edit_success.php");
            exit();
        } else {
            require_once("views/teacher_edit_error.php");
            exit();            
        }
    }
}
?>