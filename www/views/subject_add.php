<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма добавления нового предмета</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="subject_add" action="/subject_add">
          <fieldset>
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
                        <input type="checkbox" id="s_group" name="s_group" value="1">
                    </div>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="s_active">Активен</label>  
                <div class="col-md-1">
                    <div class="checkbox">
                        <input type="checkbox" id="s_active" name="s_active" value="1" checked>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Добавить предмет</button>
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
