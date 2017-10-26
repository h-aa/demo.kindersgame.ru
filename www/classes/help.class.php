<?php
class Help
{	
	public $action;

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
}
