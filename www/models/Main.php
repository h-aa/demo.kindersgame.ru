<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');

class MainModel
{

	static $mysql;

	function __construct()
	{
		$mysqli 		= new mysqli(DBHOST, DBUSER, DBPASS, DBBASE);
		if($mysqli->connect_errno)
		{
			echo "Ошибка: " . $mysqli->connect_error . "\n";
			exit();
		}
		$mysqli->set_charset("utf8");
		self::$mysql 	= $mysqli;

	}

	function get_all_region()
	{
		$sql 			= "SELECT * FROM `region`";
		$result 		= self::$mysql->query($sql);
		return $result;
	}

	function get_city($id)
	{
		$id 			= self::$mysql->real_escape_string($id);
		$sql 			= "SELECT * FROM `city` WHERE `city_region` = $id";
		$result 		= self::$mysql->query($sql);
		return $result;
	}

	function check_region($id)
	{
		$id 			= self::$mysql->real_escape_string($id);
		$sql 			= "SELECT * FROM `region` WHERE `region_id` = $id";
		$result 		= self::$mysql->query($sql);
		return $result;
	}

	function check_city($id_region, $id_city)
	{
		$id_region 		= self::$mysql->real_escape_string($id_region);
		$id_city 		= self::$mysql->real_escape_string($id_city);
		$sql 			= "SELECT * FROM `city` WHERE `city_id` = $id_city AND `city_region` = $id_region";
		$result 		= self::$mysql->query($sql);
		return $result;
	}

	function check_comment($id)
	{
		$id 			= self::$mysql->real_escape_string($id);
		$sql 			= "SELECT * FROM `comment` WHERE `comment_id` = $id";
		$result 		= self::$mysql->query($sql);
		return $result;
	}

	function get_all_comment()
	{
		$sql 			= "SELECT * FROM `comment`";
		$result 		= self::$mysql->query($sql);
		return $result; 
	}

	function get_limit_comment($num_page = 1)
	{
		$position 		= $num_page == 1 ? 0 : $num_page * COMMENTLIMIT - COMMENTLIMIT;
		$sql 			= "SELECT `comment`.`comment_id`, `comment`.`first_name`,`comment`.`second_name`, `comment`.`third_name`, `comment`.`phone`, `comment`.`email`, `comment`.`comment`, `region`.`region_name`, `city`.`city_name` FROM `comment`,`city`,`region` WHERE `comment`.`region` = `region`.`region_id` AND `comment`.`city` = `city`.`city_id` ORDER BY `comment_id` LIMIT ".COMMENTLIMIT." OFFSET ".$position;
		$result 		= self::$mysql->query($sql);
		return $result;
	}

	function add_comment($second_name, $first_name, $third_name, $phone, $region, $city, $email, $comment)
	{
		$second_name 	= self::$mysql->real_escape_string($second_name);		
		$first_name		= self::$mysql->real_escape_string($first_name);		
		$third_name		= self::$mysql->real_escape_string($third_name);
		$phone			= self::$mysql->real_escape_string($phone);
		$region			= self::$mysql->real_escape_string($region);
		$city 			= self::$mysql->real_escape_string($city);
		$email 			= self::$mysql->real_escape_string($email);
		$comment 		= self::$mysql->real_escape_string($comment);
		$sql 			= "INSERT INTO `comment`(`second_name`, `first_name`, `third_name`, `region`, `city`, `phone`, `email`, `comment`) VALUES('".$second_name."', '".$first_name."', '".$third_name."', '".$region."', '".$city."', '".$phone."', '".$email."', '".$comment."')";
		$result 		= self::$mysql->query($sql);
		return $result;		
	}

	function del_comment($id)
	{
		$id 			= self::$mysql->real_escape_string($id);
		$sql 			= "DELETE FROM `comment` WHERE `comment_id` = $id";
		$result			= self::$mysql->query($sql);
		return $result;
	}

	function region_stat($region_min)
	{
		$sql 			= "SELECT `region`.`region_id`,`region`.`region_name` from `region`,`comment` where `comment`.`region` = `region`.`region_id` GROUP BY `region_id` HAVING COUNT(*) > $region_min";
		$result			= self::$mysql->query($sql);
		return $result;
	}

	function num_comment_region($id)
	{
		$id 			= self::$mysql->real_escape_string($id);
		$sql			= "SELECT * FROM `comment` WHERE `region` = $id";
		$result			= self::$mysql->query($sql);		
		return $result;
	}

	function city_stat($id)
	{
		$id 			= self::$mysql->real_escape_string($id);
		$sql			= "SELECT DISTINCT `comment`.`city`,`city`.`city_name` FROM `comment`,`city` WHERE `comment`.`region` = $id AND `comment`.`city` = `city`.`city_id`";
		$result			= self::$mysql->query($sql);
		return $result;
	}

	function num_comment_city($id)
	{
		$id 			= self::$mysql->real_escape_string($id);
		$sql			= "SELECT * FROM `comment` WHERE `city` = $id";
		$result			= self::$mysql->query($sql);		
		return $result;
	}	
}
?>
