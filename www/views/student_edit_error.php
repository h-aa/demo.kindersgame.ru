<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-10 col-sm-offset-1">
    	<center>
        <h3 >Ошибка! Не удалось отредактировать данные ученика <br> <?=$st_second_name.' '.$st_first_name.' '.$st_third_name?>!</h3>
        </center>
    </data>
<?php
require_once('footer.php');
?>