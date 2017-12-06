<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<data class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма отправки SMS уведомлений о предстоящих занятиях</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="send_sms" action="/send_sms">
          <fieldset>
            <div id="select4_data" class="data1 data4">
                <div class="form-group">
                <label class="col-md-4 control-label" for="data_sms">Выберите дату</label>  
                    <div class="col-md-4">
                    <input id="data_sms" name="data_sms" type="text" placeholder="дд.мм.гггг" class="form-control input-md date" readonly required>                                        
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block">Отправить SMS оповещения о предстоящих занятиях</button>
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
<script type="text/javascript">
   $('#data_sms').datepicker({
       language: 'ru',
       startDate: '0d',
       todayHighlight: true,
       autoclose: true
  });
   
</script>