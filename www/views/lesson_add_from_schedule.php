<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма добавления занятия в расписание</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="lesson_add" action="/lesson_add">
          <fieldset>
          <input type="hidden" name="l_t_id"    value="<?=$l_t_id?>">
          <input type="hidden" name="l_date"    value="<?=$l_date?>">
          <input type="hidden" name="l_tt_id[]"   value="<?=$l_tt_id?>">
            <div class="form-group">
              <label class="col-md-4 control-label" for="l_st_id">Выберите ученика</label>  
                <div class="col-md-4">
                    <select class="form-control" name="l_st_id" id="l_st_id" required="" title="Ученик">
                    
                      <?php while($student = $students->fetch_assoc()){?>
                        <option value="<?=$student['st_id']?>"><?=$student['st_second_name'].' '.$student['st_first_name'].' '.$student['st_third_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>

            <div class="form-group data1">
              <label class="col-md-4 control-label" for="l_s_id">Выберите предмет</label>  
                <div class="col-md-4">
                    <select class="form-control" name="l_s_id" id="l_s_id" required="" title="Предмет">
                    
                      <?php while($subject = $subjects->fetch_assoc()){?>
                        <option value="<?=$subject['s_id']?>"><?=$subject['s_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Добавить занятие в расписание</button>
              </div>  
            </div>
            
          </fieldset>
        </form>
      </div>
    </div>		
    </data>        
<?=$this->help->error()?>
<?=$this->help->message()?>
<?php
require_once('footer.php');
?>
