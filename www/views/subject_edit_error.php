<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-10 col-sm-offset-1">
    	<center><h3 >Ошибка! Предмет <?=$s_name?> не изменён!</h3><h4><a href="/subject_edit">Редактировать ещё предмет</a></h4></center>
    </data>
<?php
require_once('footer.php');
?>