<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма редактирования данных ученика</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="student_edit" action="/student_edit">
          <fieldset>
          <input type="hidden" name="st_id" value="<?=$st_id?>">
          <input type="hidden" name="edit" value="1">
            <div class="form-group">
              <label class="col-md-4 control-label" for="st_second_name">Фамилия*</label>  
                <div class="col-md-4">
                  <input id="st_second_name" name="st_second_name" value="<?=$st_second_name?>" type="text" placeholder="" class="form-control input-md" required>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="st_first_name">Имя*</label>  
                <div class="col-md-4">
                  <input id="st_first_name" name="st_first_name" value="<?=$st_first_name?>" type="text" placeholder="" class="form-control input-md" required>                                        
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="st_third_name">Отчество</label>  
                <div class="col-md-4">
                  <input id="st_third_name" name="st_third_name" value="<?=$st_third_name?>" type="text" placeholder="" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="st_date_birth">Дата рождения*</label>  
                <div class="col-md-4">
                  <input id="st_date_birth" name="st_date_birth" value="<?=$st_date_birth?>" type="text" placeholder="дд.мм.гггг" class="form-control input-md date_birth" required>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="st_parent_fio">ФИО родителя</label>  
                <div class="col-md-4">
                  <input id="st_parent_fio" name="st_parent_fio" value="<?=$st_parent_fio?>" type="text" placeholder="" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="st_parent_phone">Контактный телефон родителя*</label>  
                <div class="col-md-4">
                  <input id="st_parent_phone" name="st_parent_phone" value="<?=$st_parent_phone?>" type="text" class="phone form-control input-md" required>
                </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="st_comment">Прочая информация</label>  
                <div class="col-md-4">
                  <textarea class="form-control comment" id="st_comment" name="st_comment"  rows="2"><?=$st_comment?></textarea>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="st_active">Активен</label>  
                <div class="col-md-1">
                    <div class="checkbox">
                        <input type="checkbox" id="st_active" name="st_active" value="1" <?=$st_active ? 'checked' : ''?>>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Редактировать данные ученика</button>
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
