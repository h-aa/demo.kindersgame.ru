<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('views/header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма форма удаления занятия из расписания</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="lesson_del" action="/lesson_del/<?=$num_lesson?>">
          <fieldset>
          <input type="hidden" name="agree" value="yes">
            <div class="form-group">
              <label class="col-md-6 control-label">ФИО ребёнка</label>  
                <div class="col-md-4">
                  <p class="form-control-static"><?=$data['st_second_name'].' '.$data['st_first_name'].' '.$data['st_third_name']?></p>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label">Название занятия</label>  
                <div class="col-md-4">
                  <p class="form-control-static"><?=$data['s_name']?></p>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label">Дата занятия</label>  
                <div class="col-md-4">
                  <p class="form-control-static"><?=$data['l_date']?></p>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label">Время занятия</label>  
                <div class="col-md-4">
                  <p class="form-control-static"><?=sprintf('%02d', $data['l_tt_hour_start']).':'.sprintf('%02d', $data['l_tt_minut_start']).'-'.sprintf('%02d', $data['l_tt_hour_end']).':'.sprintf('%02d', $data['l_tt_minut_end'])?></p>
                </div>
            </div>                                    
            <hr>
            <div class="form-group">
              <div class="col-md-4 col-md-offset-4">
                <a href="/" class="btn btn-info btn-block" role="button">Отмена</a>
              </div>  
            </div>
            <div class="form-group">
              <div class="col-md-4 col-md-offset-4">
                <button type="submit" id="btn" class="btn btn-danger btn-block">Удалить</button>
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