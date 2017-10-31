<?php
class Help
{	
	public $action;
    public $error = false;
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
                $error_data .= '<li>'.$message.'</li>';
            }
            $error_data .='</ul>';
            require_once('views/modal/error.php');
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
