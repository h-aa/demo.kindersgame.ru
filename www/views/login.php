<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <form class="form-signin" role="form" action="/login/" method="post">
        <h2 class="form-signin-heading">Вход для зарегистрированных пользователей</h2>
        <input type="text" name="user_name" class="form-control" placeholder="Ваш логин" required autofocus>
        <input type="password" name="user_password" class="form-control" placeholder="Ваш пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        <div class="error-message""><?=$this->help->error()?></div>
    </form>
<?php
require_once('footer.php');
?>
