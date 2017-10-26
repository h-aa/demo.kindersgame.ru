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
            $result = '<ul>';
            foreach($this->error as $message)
            {
                $result .= '<li>'.$message.'</li>';
            }
            $result .='</ul>';
            return $result;
        }
    }
}
