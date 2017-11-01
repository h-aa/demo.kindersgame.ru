<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
<div class="col-xs-12">
      <div class="panel panel-default">
      <div class="panel-heading">Форма редактирования преподавателя</div>
      <div class="panel-body">   
        <form class="form-horizontal" method="post" id="teacher_time" action="/teacher_time">
          <fieldset>
          <input type="hidden" name="t_id" value="<?=$t_id?>">
          <input type="hidden" name="edit" value="1">

<?php for($x=1;$x<=7;$x++){ ?>
			<div class="row event"> <!-- мероприятие -->
				<div class="col-md-3 time">
					<!--<span class="day"><?=$x?></span>-->
					<span class="month"><b><?=$this->help->dayWeek($x)?></b></span>
                    <hr>
                    <button type="button" value="<?=$x?>" class="btn btn-primary btn-sm time_add_btn"><i class="fa fa-clock-o fa-lg"></i> Добавить время</button>
                    <hr>
				</div>
				<div class="col-md-9">
					<h3>Рабочие часы</h3>
					<table class="table table-condensed table-hover table_time" id="<?=$x?>">
					<tr>
						<th>Время занятий (начало - конец):</th>
					</tr>
                    <?=$this->teacherTimeTable($t_id,$x)?>
					</table>
                    
				</div>
			</div>
<?php } ?>

            <hr>
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn"></label>
              <div class="col-md-4">
                <button type="submit" id="btn" class="btn btn-primary btn-block btn-lg">Сохранить расписание преподавателя</button>
              </div>  
            </div>
          </fieldset>
        </form>
      </div>
    </div>		
    </div>        
<?=$this->help->error()?>
<?=$this->help->message()?>
<?php
require_once('footer.php');
?>
<script type="text/javascript">
$(".time_add_btn").click(function() {
    var user_id         = <?=$t_id?>;
    var number_day        = $(this).val();
    var time_in_table   = $('#'+number_day+' tr').length;
    var new_id          = time_in_table + 1;
    var new_data    = '<tr><td><i class="fa fa-clock-o fa-lg"></i> ';
    new_data       += '<select name="time_data['+number_day+']['+time_in_table+'][tt_hour_start]">';
    for(x=7;x<23;x++){
        if(x<10){
            x      = '0'+x;
        }        
        new_data   += '<option value="'+x+'">'+x+'</option>';
    }
    new_data       += '</select>:';
    new_data       += '<select name="time_data['+number_day+']['+time_in_table+'][tt_minut_start]">';
    for(x=0;x<60;x++){
        if(x<10){
            x      = '0'+x;
        }        
        new_data   += '<option value="'+x+'">'+x+'</option>';
    }
    new_data       += '</select> - ';    
    new_data       += '<select name="time_data['+number_day+']['+time_in_table+'][tt_hour_end]">';
    for(x=7;x<23;x++){
        if(x<10){
            x      = '0'+x;
        }        
        new_data   += '<option value="'+x+'">'+x+'</option>';
    }
    new_data       += '</select>:';
    new_data       += '<select name="time_data['+number_day+']['+time_in_table+'][tt_minut_end]">';
    for(x=0;x<60;x++){
        if(x<10){
            x = '0'+x;
        }
        new_data   += '<option value="'+x+'">'+x+'</option>';
    }
    new_data       += '</select> <i class="fa fa-minus-circle fa-lg time_del_btn"></i>';
    new_data       += '<div class="checkbox"><label><input type="checkbox" name="time_data['+number_day+']['+time_in_table+'][tt_active]" value="1" checked> Активно</label></div>';
    new_data       += '</td></tr>';    
    $('#'+number_day).append(new_data);
});

$("body").on("click", ".time_del_btn", function () {
        var tr = $(this).closest('tr');
        tr.css("background-color","#FF3700");
        tr.fadeOut(400, function(){
            tr.remove();
        });
        return false;
});

</script>