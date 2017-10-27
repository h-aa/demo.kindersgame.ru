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
}
