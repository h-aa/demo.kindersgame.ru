<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-10 col-sm-offset-1">
    	<center>
        <h3 >Ученик <?=$st_second_name.' '.$st_first_name.' '.$st_third_name?><br> успешно добавлен!</h3>
        <h4><a href="/student_add">Добавить ещё ученика</a></h4>
        </center>
    </data>
<?php
require_once('footer.php');
?>