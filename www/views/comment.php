<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-10 col-sm-offset-1">
      <div class="panel panel-default">
      <div class="panel-heading"><h4>Форма добавления комментария</h4></div>
      <div class="panel-body">
        <form class="form-horizontal" method="post" id="comment_form" action="/comment">
          <fieldset>
            <div class="form-group">
              <label class="col-md-4 control-label" for="second_name">Фамилия*</label>  
                <div class="col-md-5 <?=isset($error['second_name']) ? 'has-error' : ''?>">
                  <input id="second_name" name="second_name" value="<?=$second_name?>" type="text" placeholder="Ваша фамилия" class="form-control input-md" required="">
                  <span class="help-block"><em><?=isset($error['second_name']) ? $error['second_name'] : ''?></em></span>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="first_name">Имя*</label>  
                <div class="col-md-5 <?=isset($error['first_name']) ? 'has-error' : ''?>">
                  <input id="first_name" name="first_name" value="<?=$first_name?>" type="text" placeholder="Ваше имя" class="form-control input-md" required="">
                  <span class="help-block"><em><?=isset($error['first_name']) ? $error['first_name'] : ''?></em></span>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="third_name">Отчество</label>  
                <div class="col-md-5">
                  <input id="third_name" name="third_name" value="<?=$third_name?>" type="text" placeholder="Ваше имя" class="form-control input-md">
                </div>
            </div>                     
            <div class="form-group">
              <label class="col-md-4 control-label" for="email">e-mail</label>  
                <div class="col-md-5 <?=isset($error['email']) ? 'has-error' : ''?>">
                  <input id="email" name="email" value="<?=$email?>" type="email" placeholder="Ваш e-mail" class="form-control input-md">
                  <span class="help-block"><em><?=isset($error['email']) ? $error['email'] : ''?></em></span>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="phone">Контактный телефон</label>  
                <div class="col-md-5 <?=isset($error['phone']) ? 'has-error' : ''?>">
                  <input id="phone" name="phone" value="<?=$phone?>" type="text" class="form-control input-md">
                  <span class="help-block"><em><?=isset($error['phone']) ? $error['phone'] : ''?></em></span>
                </div>
            </div>
            <div class="form-group">
              <label for="region" class="col-md-4 control-label">Регион</label>
              <div class="col-md-5 <?=isset($error['region']) ? 'has-error' : ''?>">
                <select class="form-control" name="region" id="region" required="" title="Регион">
                  <?=$this->region()?>
                </select>
                <span class="help-block"><em><?=isset($error['region']) ? $error['region'] : ''?></em></span>
              </div>
            </div>            
            
                <div class="form-group">
                  <label for="city" class="col-md-4 control-label">Город</label>
                  <div class="col-md-5 <?=isset($error['city']) ? 'has-error' : ''?>" >
                    <select class="form-control" name="city" id="city" required title="Город">
                      <?=$this->city()?>
                    </select>
                  <span class="help-block"><em><?=isset($error['city']) ? $error['city'] : ''?></em></span>                  
                  </div>
                </div>
           
                         
            <div class="form-group">
              <label class="col-md-4 control-label" for="comment">Комментарий*</label>  
                <div class="col-md-5 <?=isset($error['comment']) ? 'has-error' : ''?>">
                  <textarea class="form-control" id="comment" name="comment"  rows="5" required=""><?=$comment?></textarea>
                  <span class="help-block"><em><?=isset($error['comment']) ? $error['comment'] : ''?></em></span>
                </div>
            </div>                       
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-5">
                <button type="submit" id="btn" class="btn btn-primary">Добавить комментарий</button>
              </div>  
            </div>                                                      
          </fieldset>
        </form>
      </div>
    </div>		
    </data>
<?php
require_once('footer.php');
?>
<script type="text/javascript">
//Назначаем маски ввода
  $("#phone").mask("(999) 999-99-99");

//Обработка событий
  $(document).on("change", "#region", function(){
    var a = $(this).val();
    get_city_list(a);
  });
</script>
