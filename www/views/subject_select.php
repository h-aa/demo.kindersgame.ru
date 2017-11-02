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
            <div class="form-group">
              <label class="col-md-4 control-label" for="s_id">Выберите предмет</label>  
                <div class="col-md-4">
                    <select class="form-control" name="s_id" id="s_id" required="" title="Предмет">
                      <?php while($subject = $subjects->fetch_assoc()){?>
                        <option value="<?=$subject['s_id']?>"><?=$subject['s_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Редактировать предмет</button>
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