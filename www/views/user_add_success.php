<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-10 col-sm-offset-1">
    	<center>
            <h3 >Пользователь <br> <?=$u_second_name.' '.$u_first_name.' '.$u_third_name?> <br> успешно добавлен!</h3>
            <h4><a href="/user_add/">Добавить ещё пользователя</a></h4>
        </center>
    </data>
<?php
require_once('footer.php');
?>