<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма добавления нового системного пользователя</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="user_add" action="/user_add">
          <fieldset>
            <div class="form-group">
              <label class="col-md-4 control-label" for="u_login">Логин*</label>  
                <div class="col-md-4">
                  <input id="u_login" name="u_login" value="<?=$u_login?>" type="text" placeholder="" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="u_password">Пароль*</label>  
                <div class="col-md-4">
                  <input id="u_password" name="u_password" value="<?=$u_password?>" type="password" placeholder="" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="u_password2">Подтверждение пароля*</label>  
                <div class="col-md-4">
                  <input id="u_password2" name="u_password2" value="<?=$u_password2?>" type="password" placeholder="" class="form-control input-md" required>
                </div>
            </div>                                  
            <div class="form-group">
              <label class="col-md-4 control-label" for="u_second_name">Фамилия*</label>  
                <div class="col-md-4">
                  <input id="u_second_name" name="u_second_name" value="<?=$u_second_name?>" type="text" placeholder="" class="form-control input-md" required>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="u_first_name">Имя*</label>  
                <div class="col-md-4">
                  <input id="u_first_name" name="u_first_name" value="<?=$u_first_name?>" type="text" placeholder="" class="form-control input-md" required>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="u_third_name">Отчество</label>  
                <div class="col-md-4">
                  <input id="u_third_name" name="u_third_name" value="<?=$u_third_name?>" type="text" placeholder="" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="u_email">Email</label>  
                <div class="col-md-4">
                  <input id="u_email" name="u_email" value="<?=$u_email?>" type="email" placeholder="" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="u_phone">Контактный телефон*</label>  
                <div class="col-md-4">
                  <input id="u_phone" name="u_phone" value="<?=$u_phone?>" type="text" class="form-control input-md phone" required>
                </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="u_comment">Прочая информация</label>  
                <div class="col-md-4">
                  <textarea class="form-control comment" id="u_comment" name="u_comment"  rows="5"><?=$u_comment?></textarea>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="u_type">Тип пользователя</label>  
                <div class="col-md-4">
                  <select class="form-control" name="u_type" id="u_type">
                  <option value="1">Системный пользователь</option>
                  <option value="2">Родитель</option>
                  </select>
                </div>
            </div>            
            <?=$this->userRightsTable()?>
            <div class="form-group" id="students_data" style="display:none">
              <label class="col-md-4 control-label" for="st_id">Родитель следующих детей:</label>  
                <div class="col-md-4">
                    <?php while($student = $students->fetch_assoc()){?>
                        <div class="checkbox">
                        <label><input type="checkbox" name="students[]" value="<?=$student['st_id']?>"><?=$student['st_second_name'].' '.$student['st_first_name'].' '.$student['st_third_name']?></label>
                        </div>
                    <?php }?>                  
                </div>
            </div>            
            <div class="form-group">
              <label class="col-md-4 control-label" for="u_active">Активен</label>  
                <div class="col-md-1">
                    <div class="checkbox">
                        <input type="checkbox" id="u_active" name="u_active" value="1" checked>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Добавить пользователя</button>
              </div>  
            </div>
          </fieldset>
        </form>
      </div>
    </div>		
    </data>        
<?=$this->help->error()?>
<?php
require_once('footer.php');
?>
