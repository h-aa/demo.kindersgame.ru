<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма редактирования предмета</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="subject_edit" action="/subject_edit">
          <fieldset>
          <input type="hidden" name="edit" value="1">
          <input type="hidden" name="s_id" value="<?=$s_id?>">
            <div class="form-group">
              <label class="col-md-4 control-label" for="s_name">Название предмета*</label>  
                <div class="col-md-4">
                  <input id="s_name" name="s_name" value="<?=$s_name?>" type="text" placeholder="" class="form-control input-md" required>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="s_group">Групповое занятие</label>  
                <div class="col-md-1">
                    <div class="checkbox">
                        <input type="checkbox" id="s_group" name="s_group" value="1" <?=$s_group ? 'checked' : ''?>>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="s_active">Активен</label>  
                <div class="col-md-1">
                    <div class="checkbox">
                        <input type="checkbox" id="s_active" name="s_active" value="1" <?=$s_active ? 'checked' : ''?>>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Сохранить изменения</button>
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
