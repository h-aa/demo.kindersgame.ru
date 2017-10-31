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
        return $this->mysql->insert_id;	
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

    function getTeacherTimeData($t_id, $num_day)
    {
        $t_id           = $this->mysql->real_escape_string($t_id);
        $num_day           = $this->mysql->real_escape_string($num_day);
        $query          = "SELECT * FROM `teachers_time` WHERE `tt_teacher_id` = '".$t_id."' AND `tt_day` = '".$num_day."'";
        $result         = $this->mysql->query($query);
        return $result;
    }

    function addTeacherTimeData($tt_teacher_id, $tt_day, $tt_hour_start, $tt_minut_start, $tt_hour_end, $tt_minut_end, $tt_active)
    {
        $tt_teacher_id          = $this->mysql->real_escape_string($tt_teacher_id);
        $tt_day                 = $this->mysql->real_escape_string($tt_day);
        $tt_hour_start          = $this->mysql->real_escape_string($tt_hour_start);
        $tt_minut_start         = $this->mysql->real_escape_string($tt_minut_start);
        $tt_hour_end            = $this->mysql->real_escape_string($tt_hour_end);
        $tt_minut_end           = $this->mysql->real_escape_string($tt_minut_end);
        $tt_active              = $this->mysql->real_escape_string($tt_active);
        $query                  = "INSERT INTO `teachers_time`(`tt_teacher_id`, `tt_day`, `tt_hour_start`, `tt_minut_start`, `tt_hour_end`, `tt_minut_end`, `tt_active`) VALUES ('".$tt_teacher_id."', '".$tt_day."', '".$tt_hour_start."', '".$tt_minut_start."', '".$tt_hour_end."', '".$tt_minut_end."', '".$tt_active."')";
        $result                 = $this->mysql->query($query);
        return $result;        
    }

    function delTeacherTimeData($t_id)
    {
        $t_id           = $this->mysql->real_escape_string($t_id);
        $query          = "DELETE FROM `teachers_time` WHERE `tt_teacher_id` = '".$t_id."'";
        $result         = $this->mysql->query($query);
        return $result;
    }

    function checkTeacherTimeData($tt_teacher_id, $tt_day, $tt_hour_start, $tt_minut_start, $tt_hour_end, $tt_minut_end)
    {
        $tt_teacher_id          = $this->mysql->real_escape_string($tt_teacher_id);
        $tt_day                 = $this->mysql->real_escape_string($tt_day);
        $tt_hour_start          = $this->mysql->real_escape_string($tt_hour_start);
        $tt_minut_start         = $this->mysql->real_escape_string($tt_minut_start);
        $tt_hour_end            = $this->mysql->real_escape_string($tt_hour_end);
        $tt_minut_end           = $this->mysql->real_escape_string($tt_minut_end);
        $query                  = "SELECT * FROM `teachers_time` 
                                WHERE `tt_teacher_id` = '".$tt_teacher_id."' 
                                AND `tt_day` = '".$tt_day."' 
                                AND `tt_hour_start` = '".$tt_hour_start."' 
                                AND `tt_minut_start` = '".$tt_minut_start."' 
                                AND `tt_hour_end` = '".$tt_hour_end."' 
                                AND `tt_minut_end` = '".$tt_minut_end."' 
                                ";
        $result                 = $this->mysql->query($query);
        return $result;        
    }

    function addSubject($s_name, $s_active)
    {
        $s_name                 = $this->mysql->real_escape_string($s_name);
        $s_active               = $this->mysql->real_escape_string($s_active);
        $query                  = "INSERT INTO `subjects`(`s_name`, `s_active`) VALUES ('".$s_name."','".$s_active."')";
        $result                 = $this->mysql->query($query);
        return $result;
    }

    function checkSubjectName($s_name)
    {
        $s_name                 = $this->mysql->real_escape_string($s_name);
        $query                  = "SELECT * FROM `subjects` WHERE `s_name` = '".$s_name."'";
        $result                 = $this->mysql->query($query);
        return $result;
    }

    function checkSubjectId($s_id)
    {
        $s_id                   = $this->mysql->real_escape_string($s_name);
        $query                  = "SELECT * FROM `subjects` WHERE `s_id` = '".$s_id."'";
        $result                 = $this->mysql->query($query);
        return $result;
    }

    function getSubjects()
    {
        $query                  = "SELECT * FROM `subjects` ORDER BY `s_name` ASC";
        $result                 = $this->mysql->query($query);
        return $result;
    }

    function getSubjectData($s_id)
    {
        $s_id                   = $this->mysql->real_escape_string($s_id);
        $query                  = "SELECT * FROM `subjects` WHERE `s_id` = '".$s_id."'";
        $result                 = $this->mysql->query($query);
        return $result;
    }
    
    function editSubject($s_id, $s_name, $s_active)
    {
        $s_id                   = $this->mysql->real_escape_string($s_id);
        $s_name                 = $this->mysql->real_escape_string($s_name);
        $s_active               = $this->mysql->real_escape_string($s_active);
        $query                  = "UPDATE `subjects` SET `s_name`= '".$s_name."',`s_active` = '".$s_active."' WHERE `s_id` = '".$s_id."'";
        $result                 = $this->mysql->query($query);
        return $result;
    }

    function addTeacherSubject($s_id, $t_id)
    {
        $s_id                   = $this->mysql->real_escape_string($s_id);
        $t_id                   = $this->mysql->real_escape_string($t_id);
        $query                  = "INSERT INTO `teachers_subject`(`ts_subject_id`, `ts_teacher_id`) VALUES ('".$s_id."', '".$t_id."')";
        $result                 = $this->mysql->query($query);
        return $result;
    }

    function delTeacherSubject($t_id)
    {
        $t_id                   = $this->mysql->real_escape_string($t_id);
        $query                  = "DELETE FROM `teachers_subject` WHERE `ts_teacher_id` = '".$t_id."'";
        $result                 = $this->mysql->query($query);
        return $result;
    }    
}
?>
