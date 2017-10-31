<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма добавления нового преподавателя</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="teacher_add" action="/teacher_add">
          <fieldset>
            <div class="form-group">
              <label class="col-md-4 control-label" for="t_second_name">Фамилия*</label>  
                <div class="col-md-4">
                  <input id="t_second_name" name="t_second_name" value="<?=$t_second_name?>" type="text" placeholder="" class="form-control input-md" required>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="t_first_name">Имя*</label>  
                <div class="col-md-4">
                  <input id="t_first_name" name="t_first_name" value="<?=$t_first_name?>" type="text" placeholder="" class="form-control input-md" required>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="t_third_name">Отчество</label>  
                <div class="col-md-4">
                  <input id="t_third_name" name="t_third_name" value="<?=$t_third_name?>" type="text" placeholder="" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="t_email">Email</label>  
                <div class="col-md-4">
                  <input id="t_email" name="t_email" value="<?=$t_email?>" type="email" placeholder="" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="t_phone">Контактный телефон*</label>  
                <div class="col-md-4">
                  <input id="t_phone" name="t_phone" value="<?=$t_phone?>" type="text" class="form-control input-md" required>
                </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="t_comment">Прочая информация</label>  
                <div class="col-md-4">
                  <textarea class="form-control" id="t_comment" name="t_comment"  rows="5"><?=$t_comment?></textarea>
                </div>
            </div>
            <?=$this->teacherSubjectTable()?>
            <div class="form-group">
              <label class="col-md-4 control-label" for="t_active">Активен</label>  
                <div class="col-md-1">
                    <div class="checkbox">
                        <input type="checkbox" id="t_active" name="t_active" value="1" checked>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Добавить преподавателя</button>
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
