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
        if($_POST)
        {
            if(!$this->auth->isAdmin() && !$this->auth->userRights(10))
            {
                goto schedule;
            }
            if(!$_POST['date_start'] && !$_POST['date_end'])
            {
                $this->help->error[]    = 'Поля с датами не заполнены';
                goto schedule;
            }
            if(!$_POST['date_start'] && $_POST['date_end'])
            {
                $_POST['date_start']    = $_POST['date_end'];
            }
            if($_POST['date_start'] && !$_POST['date_end'])
            {
                $_POST['date_end']      = $_POST['date_start'];
            }            
            $start_date                 = strtotime($_POST['date_start']);
            $end_date                   = strtotime($_POST['date_end']);
            if($end_date < $start_date)
            {
                $this->help->error[]    = 'Дата окончания не может быть меньше даты начала';
                goto schedule;
            }
            if(($end_date - $start_date) > 5270400)//Максимальный период в 2 месяца
            {
                $this->help->error[]    = 'Максимальный период не может превышать 2 месяца';
                goto schedule;                
            }
            if(!$this->help->error)
            {
                require_once('views/schedule.php');
                exit();            
            }            

        }
        schedule:
        $start_date = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
        $end_date   = mktime(0, 0, 0, date("m")  , date("d")+7, date("Y"));
        require_once('views/schedule.php');
	    
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

        if(!$_POST['u_login'])
        {
            $this->help->error[] = 'Не указано имя пользователя';
        }
        if(!$_POST['u_password'])
        {
            $this->help->error[] = 'Не указан пароль';
        }
        if($_POST['u_login'] && $_POST['u_password'])
        {
            if(!$this->auth->userLogin($_POST['u_login'], $_POST['u_password']))
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
        if(!$this->auth->isAdmin() && !$this->auth->userRights(5))
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
        $t_id = $this->model->addTeacher($t_first_name, $t_second_name, $t_third_name, $t_email, $t_phone, $t_comment, $t_active);
        if($t_id)
        {
            if($_POST['subject'])
            {
                foreach($_POST['subject'] as $val)
                {
                    if($this->model->checkSubjectId($val))
                    {
                        $this->model->addTeacherSubject($val, $t_id);
                    }    
                }
            }
            require_once("views/teacher_add_success.php");
            exit();            
        } else {
            require_once("views/teacher_add_error.php");
            exit();            
        }
    }

    public function teacher_edit()
    {
        if(!$this->auth->isAdmin() && !$this->auth->userRights(6))
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
            if($_POST['subject'])
            {
                $this->model->delTeacherSubject($t_id);
                foreach($_POST['subject'] as $val)
                {
                    if($this->model->checkSubjectId($val))
                    {
                        $this->model->addTeacherSubject($val, $t_id);
                    }    
                }
            }            
            require_once("views/teacher_edit_success.php");
            exit();
        } else {
            require_once("views/teacher_edit_error.php");
            exit();            
        }
    }

    public function teacher_time()
    {
        if(!$this->auth->isAdmin() && !$this->auth->userRights(7))
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'teacher_time';
        
        $t_id               = $_POST['t_id'] ? htmlspecialchars($_POST['t_id'])          : '';      
        
        if(!$t_id)
        {
            $teachers = $this->model->getTeachers();
            require_once('views/teacher_select_to_time.php');
            exit();
        }

        $teacher_data = $this->model->getTeacherData($t_id);
        
        if($teacher_data->num_rows === 0)
        {   
            $this->auth->userLogout();
            header('Location: /');
            exit();          
        }

        if($_POST['edit'])
        {
            $this->model->delTeacherTimeData($t_id);
        }

        if($_POST['time_data'])
        {
            foreach($_POST['time_data'] as $a=>$b)
            {
                
                foreach($_POST['time_data'][$a] as $b=>$c){
                    if($c['tt_hour_start'] == $c['tt_hour_end'] && $c['tt_minut_start'] == $c['tt_minut_end'])
                    {
                        continue;
                    }

                    if($c['tt_hour_start'] > $c['tt_hour_end'])
                    {
                        continue;
                    }

                    if($c['tt_hour_start'] == $c['tt_hour_end'] && $c['tt_minut_start'] > $c['tt_minut_end'])
                    {
                        continue;
                    }
                    $tt_teacher_id          = $t_id;
                    $tt_day                 = htmlspecialchars($a);
                    $tt_hour_start          = htmlspecialchars($c['tt_hour_start']);
                    $tt_minut_start         = htmlspecialchars($c['tt_minut_start']);
                    $tt_hour_end            = htmlspecialchars($c['tt_hour_end']);
                    $tt_minut_end           = htmlspecialchars($c['tt_minut_end']);
                    $tt_active              = $c['tt_active'] ? '1' : '0';
                    $check_data = $this->model->checkTeacherTimeData($tt_teacher_id, $tt_day, $tt_hour_start, $tt_minut_start, $tt_hour_end, $tt_minut_end);
                    if($check_data->num_rows > 0)
                    {
                        continue;
                    }
                    if(!$this->model->addTeacherTimeData($tt_teacher_id, $tt_day, $tt_hour_start, $tt_minut_start, $tt_hour_end, $tt_minut_end, $tt_active))
                    {
                         $this->help->error[] = 'Не удалось добавить время '.$tt_hour_start.':'.$tt_minut_start.' - '.$tt_hour_end.':'.$tt_minut_end.' для '.$this->help->dayWeek($tt_day).'!';
                    }
                }
            }
            if(!$this->help->error)
            {
                $this->help->message[] = 'Данные успешно сохранены.';
            }
        }
        require_once("views/teacher_time.php");
       
    }

    public function subject_add()
    {
        if(!$this->auth->isAdmin() && !$this->auth->userRights(8))
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'subject_add';
        
        $s_name             = $_POST['s_name']          ? htmlspecialchars($_POST['s_name'])        : '';
        $s_group            = $_POST['s_group']         ? htmlspecialchars($_POST['s_group'])       : '';
        $s_active           = $_POST['s_active']        ? htmlspecialchars($_POST['s_active'])      : '';
        
        if(!$_POST)
        {
            require_once("views/subject_add.php");
            exit();
        }
        
        if(!$s_name)
        {
            $this->help->error[] = 'Не указано название предмета';    
        }
        $check_data = $this->model->checkSubjectName($s_name);
        if($check_data->num_rows > 0)
        {
            $this->help->error[] = 'Предмет с таким названием был ранее добавлен';    
        }

        if($this->help->error)
        {
            require_once("views/subject_add.php");
            exit();
        }

        if($this->model->addSubject($s_name, $s_group, $s_active))
        {
            require_once("views/subject_add_success.php");
            exit();            
        } else {
            require_once("views/subject_add_error.php");
            exit();            
        }
        
    }

    public function subject_edit()
    {
        if(!$this->auth->isAdmin() && !$this->auth->userRights(9))
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'subject_edit';
        $edit               = $_POST['edit']            ? htmlspecialchars($_POST['edit'])          : '';
        $s_id               = $_POST['s_id']            ? htmlspecialchars($_POST['s_id'])          : '';


        if(!$s_id)
        {
            $subjects           = $this->model->getSubjects();     
            require_once("views/subject_select.php");
            exit();
        }

        $subject_data = $this->model->getSubjectData($s_id);
        if($subject_data === 0)
        {
            $subjects           = $this->model->getSubjects();     
            require_once("views/subject_select.php");
            exit();            
        }
   
        if(!$edit)
        {
            $subject_data       = $subject_data->fetch_assoc();  
            $s_name             = $subject_data['s_name'];
            $s_group            = $subject_data['s_group'];   
            $s_active           = $subject_data['s_active'];
            require_once("views/subject_edit.php");
            exit();            
        } else {
            $s_name             = $_POST['s_name']          ? htmlspecialchars($_POST['s_name'])        : '';
            $s_group            = $_POST['s_group']         ? htmlspecialchars($_POST['s_group'])       : '';
            $s_active           = $_POST['s_active']        ? htmlspecialchars($_POST['s_active'])      : '';            
        }

        if(!$s_name)
        {
            $this->help->error[] = 'Не указано название предмета';    
        }
        

        if($this->help->error)
        {
            require_once("views/subject_edit.php");
            exit();
        }

        if($this->model->editSubject($s_id, $s_name, $s_group, $s_active))
        {
            require_once("views/subject_edit_success.php");
            exit();            
        } else {
            require_once("views/subject_edit_error.php");
            exit();            
        }
        
    }

public function student_add()
    {
        if(!$this->auth->isAdmin() && !$this->auth->userRights(3))
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'student_add';
        
        $st_first_name          = $_POST['st_first_name']    ? htmlspecialchars($_POST['st_first_name'])    : '';
        $st_second_name         = $_POST['st_second_name']   ? htmlspecialchars($_POST['st_second_name'])   : '';
        $st_third_name          = $_POST['st_third_name']    ? htmlspecialchars($_POST['st_third_name'])    : '';
        $st_date_birth          = $_POST['st_date_birth']    ? htmlspecialchars($_POST['st_date_birth'])    : '';
        $st_parent_fio          = $_POST['st_parent_fio']    ? htmlspecialchars($_POST['st_parent_fio'])    : '';
        $st_parent_phone        = $_POST['st_parent_phone']  ? htmlspecialchars($_POST['st_parent_phone'])  : '';
        $st_comment             = $_POST['st_comment']       ? htmlspecialchars($_POST['st_comment'])       : '';
        $st_active              = $_POST['st_active']        ? htmlspecialchars($_POST['st_active'])        : '';

        if(!$_POST)
        {
            require_once("views/student_add.php");
            exit();
        }
        if(!$st_first_name)
        {
            $this->help->error[] = 'Не указано имя ученика';
        }
        if(!$st_second_name)
        {
            $this->help->error[] = 'Не указана фамилия ученика';
        }
        if(!$st_date_birth)
        {
            $this->help->error[] = 'Не указана дата рождения ученика';
        }        
        if(!$st_parent_phone)
        {
            $this->help->error[] = 'Не указан телефон родителя';
        }
        $check_student           = $this->model->checkStudent($st_first_name, $st_second_name, $st_third_name, $st_date_birth);
        if($check_student->num_rows > 0)
        {
            $this->help->error[] = 'Ученик с такими же фамилией, именем, отчеством и датой рождения уже имеется в базе данных';
        }
        if($this->help->error)
        {
            require_once("views/student_add.php");
            exit();
        }

        $st_id = $this->model->addStudent($st_first_name, $st_second_name, $st_third_name, $st_date_birth, $st_parent_fio, $st_parent_phone, $st_comment, $st_active);
        if($st_id)
        {
            require_once("views/student_add_success.php");
            exit();            
        } else {
            require_once("views/student_add_error.php");
            exit();            
        }
    }

    public function student_edit()
    {
        if(!$this->auth->isAdmin() && !$this->auth->userRights(4))
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'student_edit';
        
        $st_id               = $_POST['st_id']            ? htmlspecialchars($_POST['st_id'])          : '';      
        if(!$st_id)
        {
            $students = $this->model->getStudents();
            require_once('views/student_select.php');
            exit();
        }
        
        $student_data = $this->model->getStudentData($st_id);
        
        if($student_data->num_rows === 0)
        {   
            $this->auth->userLogout();
            header('Location: /');
            exit();          
        }
        if($st_id && !$_POST['edit'])
        {
            $st_data            = $student_data->fetch_assoc();
            $st_first_name      = $st_data['st_first_name'];
            $st_second_name     = $st_data['st_second_name'];
            $st_third_name      = $st_data['st_third_name'];
            $st_date_birth      = $st_data['st_date_birth'];
            $st_parent_fio      = $st_data['st_parent_fio'];
            $st_parent_phone    = $st_data['st_parent_phone'];
            $st_comment         = $st_data['st_comment'];
            $st_active          = $st_data['st_active'];             
        } else {
            $st_first_name      = $_POST['st_first_name']    ? htmlspecialchars($_POST['st_first_name'])  : '';
            $st_second_name     = $_POST['st_second_name']   ? htmlspecialchars($_POST['st_second_name']) : '';
            $st_third_name      = $_POST['st_third_name']    ? htmlspecialchars($_POST['st_third_name'])  : '';
            $st_date_birth      = $_POST['st_date_birth']    ? htmlspecialchars($_POST['st_date_birth'])  : '';
            $st_parent_fio      = $_POST['st_parent_fio']    ? htmlspecialchars($_POST['st_parent_fio'])  : '';
            $st_parent_phone    = $_POST['st_parent_phone']  ? htmlspecialchars($_POST['st_parent_phone']): '';
            $st_comment         = $_POST['st_comment']       ? htmlspecialchars($_POST['st_comment'])     : '';
            $st_active          = $_POST['st_active']        ? htmlspecialchars($_POST['st_active'])      : '';  
        }


        if(!$st_first_name)
        {
            $this->help->error[] = 'Не указано имя ученика';
        }
        if(!$st_second_name)
        {
            $this->help->error[] = 'Не указана фамилия ученика';
        }
        if(!$st_date_birth)
        {
            $this->help->error[] = 'Не указана дата рождения ученика';
        }        
        if(!$st_parent_phone)
        {
            $this->help->error[] = 'Не указан телефон родителя';
        }

        if($this->help->error || !$_POST['edit'])
        {
            require_once("views/student_edit.php");
            exit();
        }
        
        if($this->model->editStudentData($st_id, $st_first_name, $st_second_name, $st_third_name, $st_date_birth, $st_parent_fio, $st_parent_phone, $st_comment, $st_active))
        {            
            require_once("views/student_edit_success.php");
            exit();
        } else {
            require_once("views/student_edit_error.php");
            exit();            
        }
    }

    public function lesson_add()
    {
        if(!$this->auth->isAdmin() && !$this->auth->userRights(1))
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'lesson_add';
        
        $l_st_id            = $_POST['l_st_id']             ? htmlspecialchars($_POST['l_st_id'])       : '';
        $l_s_id             = $_POST['l_s_id']              ? htmlspecialchars($_POST['l_s_id'])        : '';
        $l_t_id             = $_POST['l_t_id']              ? htmlspecialchars($_POST['l_t_id'])        : '';
        $l_date             = $_POST['l_date']              ? htmlspecialchars($_POST['l_date'])        : '';
        $l_tt_id            = $_POST['l_tt_id']             ? $_POST['l_tt_id']                         : '';
        $students = $this->model->getStudents();
        $subjects = $this->model->getSubjects();        
        if(!$_POST)
        {
            require_once("views/lesson_add.php");
            exit();
        }

        if(!$l_st_id)
        {
            $this->help->error[]        = 'Не выбран ученик';    
        }
        if($l_st_id)
        {
            $student_data = $this->model->getStudentData($l_st_id);
            if($student_data->num_rows === 0)
            {
                $this->help->error[]    = 'Не верный id ученика';
            }
        }

        if(!$l_s_id)
        {
            $this->help->error[]        = 'Не выбран предмет';
        }
        if($l_s_id)
        {
            $subject_data = $this->model->getSubjectData($l_s_id);
            if($subject_data->num_rows === 0)
            {
                $this->help->error[]    = 'Не верный id предмета';
                goto error;
            }              
        }

        if(!$l_t_id)
        {
            $this->help->error[]        = 'Не выбран преподаватель';
            goto error;
        }
        if($l_t_id)
        {
            $teacher_data = $this->model->getTeacherData($l_t_id);
            if($teacher_data->num_rows === 0)
            {
                $this->help->error[]    = 'Не верный id преподавателя';
                goto error;
            }
        }

        if(!$l_date)
        {
            $this->help->error[]        = 'Не указана дата занятия';
            goto error;
        }
        if($l_date)
        {
            $today = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
            $l_date_unixtime = strtotime($l_date);
            if($l_date_unixtime < $today)
            {
               $this->help->error[]        = 'Запрещено добавлять занятия на прошедшую дату';
               goto error;
            }
            $num_day = date("w", strtotime($l_date));
            $num_day = $num_day == 0 ? 1 : $num_day;
            $check_teacher_time = $this->model->getTeacherTimeDataActive($l_t_id, $num_day);
            if($check_teacher_time->num_rows === 0)
            {
                $this->help->error[]        = 'На выбранную дату отсутствует время в расписание преподавателя';
                goto error; 
            }            
        }

        if(!$l_tt_id)
        {
            $this->help->error[]            = 'Не указано время занятия';
            goto error;   
        }
        if($l_tt_id)
        {
            if(!is_array($l_tt_id))
            {
                $this->help->error[]        = 'Не верный формат времени занятий';
            } else {
                foreach($l_tt_id as $time_id)
                {
                   $time_data = $this->model->getTimeData($time_id);
                   if($time_data->num_rows === 0)
                   {
                        $this->help->error[] = 'Не верный id времени занятия';
                   } else {
                        $time_data = $time_data->fetch_assoc();
                        $unix_time_start = strtotime($l_date.' '.$time_data['tt_hour_start'].':'.$time_data['tt_minut_start']);
                        if(strtotime("now")> $unix_time_start)
                        {
                           $this->help->error[] = 'Занятие не может быть добавлено для прошедшего времени'; 
                        }
                   }
                   
                   $check_lesson_on_schedule = $this->model->checkLessonOnSchedule($l_t_id, $l_date, $time_data['tt_hour_start'], $time_data['tt_hour_end'], $time_data['tt_minut_start'], $time_data['tt_minut_end'], $l_st_id);
                   if($check_lesson_on_schedule->num_rows > 0)
                   {
                       $this->help->error[] = 'Попытка повторного добавления данных занятия для выбранного ученика.';
                   }

                   $s_data = $subject_data->fetch_assoc();
                   if($s_data['s_group'] == 0)
                   {
                       $check_lesson_on_schedule = $this->model->checkLessonOnSchedule($l_t_id, $l_date, $time_data['tt_hour_start'], $time_data['tt_hour_end'], $time_data['tt_minut_start'], $time_data['tt_minut_end']);
                       if(!$check_lesson_on_schedule->num_rows === 0)
                       {
                           $this->help->error[] = 'Данное занятие не является групповым и добавление нескольких учеников на одно время запрещенно';
                       }
                   }
                }

            }
        }

        error:
        if($this->help->error)
        {
            require_once("views/lesson_add.php");
            exit();
        }

        foreach($l_tt_id as $val)
        {
            $time_data          = '';
            $tt_data          = $this->model->getTimeData($val);
            $time_data          = $tt_data->fetch_assoc();         
            $unix_time_start    = strtotime($l_date.' '.$time_data['tt_hour_start'].':'.$time_data['tt_minut_start']);
            $unix_time_end      = strtotime($l_date.' '.$time_data['tt_hour_end'].':'.$time_data['tt_minut_end']);
            if(!$this->model->addLesson($_SESSION['user_id'], $l_st_id, $l_s_id, $l_t_id, $l_date, $val, $time_data['tt_hour_start'], $time_data['tt_minut_start'], $time_data['tt_hour_end'], $time_data['tt_minut_end'], $unix_time_start, $unix_time_end))
            {
                $this->help->error[] = 'Произошла ошибка при добавление времени '.sprintf('%02d', $time_data['tt_hour_start']).':'.sprintf('%02d', $time_data['tt_minut_start']).' - '.sprintf('%02d', $time_data['tt_hour_end']).':'.sprintf('%02d', $time_data['tt_minut_end']);
            }
        }
        if($this->help->error)
        {
            goto error;
        } else {
            require_once("views/lesson_add_success.php");
            exit();        
        }
        
    }

    function lesson_add_from_schedule()
    {
        $l_t_id             = $_POST['l_t_id']              ? htmlspecialchars($_POST['l_t_id'])        : '';
        $l_date             = $_POST['l_date']              ? htmlspecialchars($_POST['l_date'])        : '';
        $l_tt_id            = $_POST['l_tt_id']             ? $_POST['l_tt_id']                         : '';
        $students = $this->model->getStudents();
        $subjects = $this->model->getTeacherSubject($l_t_id);
        require_once("views/lesson_add_from_schedule.php");
    }

    function lesson_del($num_lesson = false)
    {
        if((!$this->auth->isAdmin() && !$this->auth->userRights(2)) || !$num_lesson)
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'lesson_del';
        $num_lesson     = htmlspecialchars($num_lesson);
        $data_lesson    = $this->model->getDataLessonFromId($num_lesson);
        if($data_lesson->num_rows === 0)
        {
            header('Location: /');
            exit();            
        }
        if($_POST['agree'])
        {
            if($this->model->delLesson($num_lesson))
            {
                $this->model->delLessonSetData($num_lesson);
                require_once("views/lesson_del_success.php");
            } else {
                require_once("views/lesson_del_error.php");
            }
            exit();
        }
        $data           = $data_lesson->fetch_assoc();
        require_once("views/lesson_del.php"); 
    }

    
    
    public function user_add()
    {
        if(!$this->auth->isAdmin())
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'user_add';
        
        $u_login            = $_POST['u_login']         ? htmlspecialchars(trim($_POST['u_login'])) : '';
        $u_password         = $_POST['u_password']      ? trim($_POST['u_password'])                : '';
        $u_password2        = $_POST['u_password2']     ? trim($_POST['u_password2'])               : '';
        $u_first_name       = $_POST['u_first_name']    ? htmlspecialchars($_POST['u_first_name'])  : '';
        $u_second_name      = $_POST['u_second_name']   ? htmlspecialchars($_POST['u_second_name']) : '';
        $u_third_name       = $_POST['u_third_name']    ? htmlspecialchars($_POST['u_third_name'])  : '';
        $u_email            = $_POST['u_email']         ? htmlspecialchars($_POST['u_email'])       : '';
        $u_phone            = $_POST['u_phone']         ? htmlspecialchars($_POST['u_phone'])       : '';
        $u_comment          = $_POST['u_comment']       ? htmlspecialchars($_POST['u_comment'])     : '';
        $u_type             = $_POST['u_type']          ? htmlspecialchars($_POST['u_type'])        : '';
        $u_active           = $_POST['u_active']        ? htmlspecialchars($_POST['u_active'])      : '';

        // $this->help->printPost();
        // exit;
        $students = $this->model->getStudents();
        if(!$_POST)
        {
            require_once("views/user_add.php");
            exit();
        }
        if(!$u_login)
        {
            $this->help->error[] = 'Не указан логин пользователя';
        }
        if($u_login)
        {
            $check_login        = $this->model->checkLogin($u_login);
            if($check_login->num_rows > 0)
            {
                $this->help->error[] = 'Пользователь с таким логином уже имеется в базе данных';
            }
        }
        if(!$u_password)
        {
            $this->help->error[] = 'Не указан пароль пользователя';
        }
        if(!$u_password2)
        {
            $this->help->error[] = 'Не указано подтверждение пароля пользователя';
        }        
        if($u_password && iconv_strlen($u_password,'UTF-8') < 6)
        {
            $this->help->error[] = 'Пароль должен содержать как минимум 6 символов';
        }
        if($u_password && $u_password2 && $u_password !=$u_password2)
        {
            $this->help->error[] = 'Пароль и подтверждение пароля не сопадают';
        }                       
        if(!$u_first_name)
        {
            $this->help->error[] = 'Не указано имя пользователя';
        }
        if(!$u_second_name)
        {
            $this->help->error[] = 'Не указана фамилия пользователя';
        }
        if(!$u_phone)
        {
            $this->help->error[] = 'Не указан телефон пользователя';
        }        
		if($u_email && !filter_var($u_email, FILTER_VALIDATE_EMAIL))
		{
			$this->help->error[] = 'Неверный формат Email';
		}
        if(!$u_type)
        {
            $this->help->error[] = 'Не указан тип пользователя';
        }
        if($this->help->error)
        {
            require_once("views/user_add.php");
            exit();
        }

        $u_password = sha1(SALT . $u_password);
        $u_id = $this->model->addUser($u_login, $u_password,$u_first_name, $u_second_name, $u_third_name, $u_email, $u_phone, $u_comment, $u_type, $u_active);
        if($u_id)
        {
            if($_POST['rights'] && $u_type == 1)
            {
                foreach($_POST['rights'] as $val)
                {
                    $check_right = $this->model->checkRightId($val);
                    if($check_right->num_rows > 0)
                    {
                        $this->model->addUserRight($val, $u_id);
                    }    
                }
            }

            if($_POST['students'] && $u_type == 2)
            {
                foreach($_POST['students'] as $val)
                {
                    $check_student = $this->model->getStudentData($val);
                    if($check_student->num_rows > 0)
                    {
                        $this->model->addParentStudent($u_id, $val);
                    }    
                }
            }            

            require_once("views/user_add_success.php");
            exit();            
        } else {
            require_once("views/user_add_error.php");
            exit();            
        }
    }
    
    public function user_edit()
    {
        if(!$this->auth->isAdmin())
        {
            header('Location: /');
            exit();
        }
        
        $this->help->action = 'user_edit';
        
        $u_id               = $_POST['u_id']            ? htmlspecialchars($_POST['u_id'])          : '';      
        if(!$u_id)
        {
            $users = $this->model->getUsers();
            require_once('views/user_select.php');
            exit();
        }
        
        $user_data  = $this->model->getUserData($u_id);
        $students   = $this->model->getStudents();
        if($user_data->num_rows === 0)
        {   
            $this->auth->userLogout();
            header('Location: /');
            exit();          
        }
        if($u_id && !$_POST['edit'])
        {
            $u_data = $user_data->fetch_assoc();
            $u_login            = $u_data['u_login'];
            $u_first_name       = $u_data['u_first_name'];
            $u_second_name      = $u_data['u_second_name'];
            $u_third_name       = $u_data['u_third_name'];
            $u_email            = $u_data['u_email'];
            $u_phone            = $u_data['u_phone'];
            $u_comment          = $u_data['u_comment'];
            $u_type             = $u_data['u_type'];
            $u_active           = $u_data['u_active'];             
        } else {
            $u_login            = $_POST['u_login']         ? htmlspecialchars(trim($_POST['u_login'])) : '';
            $u_password         = $_POST['u_password']      && !empty($_POST['u_password'])     ? trim($_POST['u_password'])  : '';
            $u_password2        = $_POST['u_password2']     && !empty($_POST['u_password2'])    ? trim($_POST['u_password2']) : '';            
            $u_first_name       = $_POST['u_first_name']    ? htmlspecialchars($_POST['u_first_name'])  : '';
            $u_second_name      = $_POST['u_second_name']   ? htmlspecialchars($_POST['u_second_name']) : '';
            $u_third_name       = $_POST['u_third_name']    ? htmlspecialchars($_POST['u_third_name'])  : '';
            $u_email            = $_POST['u_email']         ? htmlspecialchars($_POST['u_email'])       : '';
            $u_phone            = $_POST['u_phone']         ? htmlspecialchars($_POST['u_phone'])       : '';
            $u_comment          = $_POST['u_comment']       ? htmlspecialchars($_POST['u_comment'])     : '';
            $u_type             = $_POST['u_type']          ? htmlspecialchars($_POST['u_type'])        : '';
            $u_active           = $_POST['u_active']        ? htmlspecialchars($_POST['u_active'])      : '';  
        }

        if(!$_POST['edit'])
        {
            require_once("views/user_edit.php");
            exit();
        }

        if(!$u_login)
        {
            $this->help->error[] = 'Не указан логин пользователя';
        }
        if($u_login)
        {
            $check_login        = $this->model->checkLogin($u_login, $u_id);
            if($check_login->num_rows > 0)
            {
                $this->help->error[] = 'Пользователь с таким логином уже имеется в базе данных';
            }
        }
        if($u_password)
        {
            if(!$u_password2)
            {
                $this->help->error[] = 'Не указано подтверждение пароля пользователя';
            }        
            if($u_password && iconv_strlen($u_password,'UTF-8') < 6)
            {
                $this->help->error[] = 'Пароль должен содержать как минимум 6 символов';
            }
            if($u_password !=$u_password2)
            {
                $this->help->error[] = 'Пароль и подтверждение пароля не сопадают';
            }
        }                       
        if(!$u_first_name)
        {
            $this->help->error[] = 'Не указано имя пользователя';
        }
        if(!$u_second_name)
        {
            $this->help->error[] = 'Не указана фамилия пользователя';
        }
        if(!$u_phone)
        {
            $this->help->error[] = 'Не указан телефон пользователя';
        }        
		if($u_email && !filter_var($u_email, FILTER_VALIDATE_EMAIL))
		{
			$this->help->error[] = 'Неверный формат Email';
		}
        if(!$u_type)
        {
            $this->help->error[] = 'Не указан тип пользователя';
        }
        if($this->help->error)
        {
            require_once("views/user_edit.php");
            exit();
        }
        
        if($u_password)
        {
            $u_password = sha1(SALT . $u_password);
        }
        if($this->model->editUserData($u_id, $u_login, $u_password, $u_first_name, $u_second_name, $u_third_name, $u_email, $u_phone, $u_comment, $u_type, $u_active))
        {
            $this->model->delUserRights($u_id);
            $this->model->delParentStudents($u_id);
            if($_POST['rights'] && $u_type == 1)
            {                
                foreach($_POST['rights'] as $val)
                {
                    if($this->model->checkRightId($val))
                    {
                        $this->model->addUserRight($val, $u_id);
                    }    
                }
            }
            if($_POST['students'] && $u_type == 2)
            {
                foreach($_POST['students'] as $val)
                {
                    $check_student = $this->model->getStudentData($val);
                    if($check_student->num_rows > 0)
                    {
                        $this->model->addParentStudent($u_id, $val);
                    }    
                }
            }                        
            require_once("views/user_edit_success.php");
            exit();
        } else {
            require_once("views/user_edit_error.php");
            exit();            
        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //Обработка Ajax запросов

    public function subject_teachers($s_id)
    {
        $s_id           = htmlspecialchars($s_id);
        $teachers       = $this->model->getSubjectTeachers($s_id);
        if($teachers->num_rows === 0)
        {
            require_once("views/subject_teachers_select_empty.php");
        } else {
            require_once("views/subject_teachers_select.php");
        }
    }

    public function free_teacher_time_to_lesson()
    {
        if(!$this->auth->isAdmin())
        {
            return false;
        }
        $l_st_id            =  $_POST['l_st_id']        ? htmlspecialchars($_POST['l_st_id'])       : '';
        $l_s_id             =  $_POST['l_s_id']         ? htmlspecialchars($_POST['l_s_id'])        : '';
        $l_t_id             =  $_POST['l_t_id']         ? htmlspecialchars($_POST['l_t_id'])        : '';
        $l_date             =  $_POST['l_date']         ? htmlspecialchars($_POST['l_date'])        : '';
        
        if(!$l_st_id || !$l_s_id || !$l_t_id || !$l_date)
        {
            return false;
        }
        $num_day            = date("w", strtotime($l_date));
        $num_day            = $num_day == 0 ? 7 : $num_day;

        $student_data       = $this->model->getStudentData($l_st_id);
        if($student_data->num_rows === 0)
        {
            return false;
        }


        $teacher_data       = $this->model->getTeacherData($l_t_id);
        if($teacher_data->num_rows === 0)
        {
            return false;
        }


        $teacher_time_data  = $this->model->getTeacherTimeDataActive($l_t_id, $num_day);
        if($teacher_time_data->num_rows === 0)
        {
            require_once('views/lesson_time_select_empty.php');
            exit();
        }

        $subject_data       = $this->model->getSubjectData($l_s_id);
        if($subject_data === 0)
        {
            return false;
        }
        $subject_data       = $subject_data->fetch_assoc();
        
        if($subject_data['s_group'] == '1')
        {
            require_once('views/lesson_time_select.php');
            exit();
        }

        $free_time= '';
        while($row = $teacher_time_data->fetch_assoc())
        {
            $check_lesson = $this->model->checkLessonOnSchedule($l_t_id, $l_date, $row['tt_hour_start'], $row['tt_hour_end'], $row['tt_minut_start'], $row['tt_minut_end']);
            if($check_lesson->num_rows === 0)
            {
                $free_time[] = $row;
            }
        }
        require_once('views/lesson_time_select_free.php');
        exit();        

        
    }

    // Различные вспомогательные функции

    private function teacherTimeTable($t_id, $num_day)
    {
        $teacher_time_data  = $this->model->getTeacherTimeData($t_id, $num_day);
        if($teacher_time_data->num_rows === 0)
        {
            return false;
        }
        require("views/teacher_time_table.php");
    }

    private function teacherSubjectTable($t_id = false)
    {
        $t_id = $t_id;
        $subject_data       = $this->model->getSubjects();
        if($subject_data->num_rows === 0)
        {
            return false;
        }
        require_once("views/teacher_subject_table.php");
    }

    private function checkTeacherSubject($t_id = false, $s_id = false)
    {
        if(!$t_id || !$s_id)
        {
            return false;
        } else {
            $check_result = $this->model->checkTeacherSubject($t_id, $s_id);
            if($check_result->num_rows === 0)
            {
                return false;
            } else {
                $text = ' checked';
                return $text;
            }
        }
    }

    private function userRightsTable($u_id = false, $u_type = false)
    {
        $u_id = $u_id;
        $u_type = $u_type;
        $rights_data       = $this->model->getRights();
        if($rights_data->num_rows === 0)
        {
            return false;
        }
        require_once("views/user_rights_table.php");
    }

    private function checkUserRight($u_id = false, $r_id = false)
    {
        if(!$u_id || !$r_id)
        {
            return false;
        } else {
            $check_result = $this->model->checkUserRight($u_id, $r_id);
            if($check_result->num_rows === 0)
            {
                return false;
            } else {
                $text = ' checked';
                return $text;
            }
        }
    }

    private function checkParentStudent($u_id = false, $st_id = false)
    {
        if(!$u_id || !$st_id)
        {
            return false;
        } else {
            $check_result = $this->model->checkParentStudent($u_id, $st_id);
            if($check_result->num_rows === 0)
            {
                return false;
            } else {
                $text = ' checked';
                return $text;
            }
        }
    }        

}
?>