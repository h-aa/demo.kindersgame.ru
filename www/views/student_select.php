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
            <div class="form-group">
              <label class="col-md-4 control-label" for="st_id">Выберите ученика</label>  
                <div class="col-md-4">
                    <select class="form-control" name="st_id" id="st_id" required="" title="Ученик">
                      <?php while($student = $students->fetch_assoc()){?>
                        <option value="<?=$student['st_id']?>"><?=$student['st_second_name'].' '.$student['st_first_name'].' '.$student['st_third_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>

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
