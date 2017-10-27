<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма редактирования данных преподавателя</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="teacher_edit" action="/teacher_edit">
          <fieldset>
            <div class="form-group">
              <label class="col-md-4 control-label" for="t_id">Выберите преподавателя</label>  
                <div class="col-md-4">
                    <select class="form-control" name="t_id" id="t_id" required="" title="Преподаватель">
                      <?php while($teacher = $teachers->fetch_assoc()){?>
                        <option value="<?=$teacher['t_id']?>"><?=$teacher['t_second_name'].' '.$teacher['t_first_name'].' '.$teacher['t_third_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Редактировать данные преподавателя</button>
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
