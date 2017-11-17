<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-10 col-sm-offset-1">
    	<center><h3 >Ошибка! Не удалось редактировать данные пользователя <?=$u_second_name.' '.$u_first_name.' '.$u_third_name?>!</h3></center>
    </data>
<?php
require_once('footer.php');
?>