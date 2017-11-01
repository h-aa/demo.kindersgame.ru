<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-10 col-sm-offset-1">
    	<center>
            <h3 >Данные преподавателя <?=$t_second_name.' '.$t_first_name.' '.$t_third_name?> успешно отредактированы!</h3>
            <h4><a href="/teacher_edit">Ещё</a></h4>
        </center>
    </data>
<?php
require_once('footer.php');
?>
