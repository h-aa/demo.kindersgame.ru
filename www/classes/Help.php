<?php
class Help
{	
	public      $action;
    public      $error      = false;
    public      $message    = false;
	// private     $mysql;

	// function __construct()
	// {
	// 	$mysqli 		        = new mysqli(DBHOST, DBUSER, DBPASS, DBBASE);
	// 	if($mysqli->connect_errno)
	// 	{
	// 		echo "Ошибка: " . $mysqli->connect_error . "\n";
	// 		exit();
	// 	}
	// 	$mysqli->set_charset("utf8");
	// 	$this->mysql 	        = $mysqli;

	// }

    public function urlActive($url)
	{
		if($this->action == $url)
		{
			$result = 'class="active"';
		} else {
			$result = '';
		}
		return $result;
	}

    public function error()
    {
        if($this->error)
        {   
            $error_data = '<ul>';
            foreach($this->error as $message)
            {
                $error_data .= '<span class="text-danger"><li>'.$message.'</span></li>';
            }
            $error_data .='</ul>';
            require_once('views/modal/error.php');
        }
    }


    public function message()
    {
        if($this->message)
        {   
            $message_data = '<ul>';
            foreach($this->message as $message)
            {
                $message_data .= '<li><span class="text-success">'.$message.'</span></li>';
            }
            $message_data .='</ul>';
            require_once('views/modal/message.php');
        }
    }

    public function dayWeek($day)
    {
        $day_name = array(
            '1' => 'Понедельник',
            '2' => 'Вторник',
            '3' => 'Среда',
            '4' => 'Четверг',
            '5' => 'Пятница',
            '6' => 'Суббота',
            '7' => 'Воскресенье'
        );
        return $day_name[$day];
    }


}
