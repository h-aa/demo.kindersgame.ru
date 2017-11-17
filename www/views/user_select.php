<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма редактирования данных пользователя</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="user_edit" action="/user_edit">
          <fieldset>
            <div class="form-group">
              <label class="col-md-4 control-label" for="st_id">Выберите пользователя</label>  
                <div class="col-md-4">
                    <select class="form-control" name="u_id" id="u_id" required="" title="Пользователь">
                      <?php while($user = $users->fetch_assoc()){?>
                        <option value="<?=$user['u_id']?>"><?=$user['u_second_name'].' '.$user['u_first_name'].' '.$user['u_third_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Редактировать данные пользователя</button>
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
