<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');

class MainModel
{

	private $mysql;

	function __construct()
	{
		$mysqli 		= new mysqli(DBHOST, DBUSER, DBPASS, DBBASE);
		if($mysqli->connect_errno)
		{
			echo "Ошибка: " . $mysqli->connect_error . "\n";
			exit();
		}
		$mysqli->set_charset("utf8");
		$this->mysql 	= $mysqli;

	}

	function addTeacher($t_first_name, $t_second_name, $t_third_name, $t_email, $t_phone, $t_comment, $t_active)
	{
		$t_first_name 	= $this->mysql->real_escape_string($t_first_name);
        $t_second_name 	= $this->mysql->real_escape_string($t_second_name);
        $t_third_name 	= $this->mysql->real_escape_string($t_third_name);
        $t_email 	    = $this->mysql->real_escape_string($t_email);
        $t_phone 	    = $this->mysql->real_escape_string($t_phone);
        $t_comment 	    = $this->mysql->real_escape_string($t_comment);
        $t_active 	    = $this->mysql->real_escape_string($t_active);
        $query          = "INSERT INTO `teachers`(`t_first_name`, `t_second_name`, `t_third_name`, `t_phone`, `t_email`, `t_comment`, `t_active`) VALUES ('".$t_first_name."', '".$t_second_name."', '".$t_third_name."', '".$t_phone."', '".$t_email."', '".$t_comment."', '".$t_active."')";
        $result         = $this->mysql->query($query);
        return $result;	
	}

    function getTeachers()
    {
        $query          = "SELECT * FROM `teachers` ORDER BY `t_second_name` ASC";
        $result         = $this->mysql->query($query);
        return $result;
    }
	
    function getTeacherData($t_id)
    {
        $t_id           = $this->mysql->real_escape_string($t_id);
        $query          = "SELECT * FROM `teachers` WHERE `t_id` = '".$t_id."'";
        $result         = $this->mysql->query($query);
        return $result;
    }

    function editTeacherData($t_id, $t_first_name, $t_second_name, $t_third_name, $t_email, $t_phone, $t_comment, $t_active)
	{
        $t_id           = $this->mysql->real_escape_string($t_id);
		$t_first_name 	= $this->mysql->real_escape_string($t_first_name);
        $t_second_name 	= $this->mysql->real_escape_string($t_second_name);
        $t_third_name 	= $this->mysql->real_escape_string($t_third_name);
        $t_email 	    = $this->mysql->real_escape_string($t_email);
        $t_phone 	    = $this->mysql->real_escape_string($t_phone);
        $t_comment 	    = $this->mysql->real_escape_string($t_comment);
        $t_active 	    = $this->mysql->real_escape_string($t_active);
        $query          = "UPDATE `teachers` SET `t_first_name`='".$t_first_name."',`t_second_name`='".$t_second_name."',`t_third_name`='".$t_third_name."',`t_phone`='".$t_phone."',`t_email`='".$t_email."',`t_comment`='".$t_comment."',`t_active`='".$t_active."' WHERE `t_id` = '".$t_id."'";
        $result         = $this->mysql->query($query);
        return $result;
    }
}
?>
