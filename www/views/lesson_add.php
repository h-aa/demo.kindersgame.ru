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

            <div class="form-group" id="select1">
              <label class="col-md-4 control-label" for="l_st_id">Выберите ученика</label>  
                <div class="col-md-4">
                    <select class="form-control" name="l_st_id" id="l_st_id" required="" title="Ученик">
                    <option value="0"></option>
                      <?php while($student = $students->fetch_assoc()){?>
                        <option value="<?=$student['st_id']?>"><?=$student['st_second_name'].' '.$student['st_first_name'].' '.$student['st_third_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>

            <div class="form-group data1" id="select2" style="display:none">
              <label class="col-md-4 control-label" for="l_s_id">Выберите предмет</label>  
                <div class="col-md-4">
                    <select class="form-control" name="l_s_id" id="l_s_id" required="" title="Предмет">
                    <option value="0"></option>
                      <?php while($subject = $subjects->fetch_assoc()){?>
                        <option value="<?=$subject['s_id']?>"><?=$subject['s_name']?></option>
                      <?php }?>                  
                    </select>
                </div>
            </div>

        <div id="select3_data" style="display:none"></div>

        <div id="select4_data" class="data1 data4" style="display:none">
            <div class="form-group">
              <label class="col-md-4 control-label" for="l_date">Выберите дату</label>  
                <div class="col-md-2">
                  <input id="l_date" name="l_date" type="text" placeholder="дд.мм.гггг" class="form-control input-md date" readonly required>                                        
                </div>
            </div>
        </div>
        <div id="select5_data" >
        </div>
            <div class="form-group data1 data2 data3 data4" id="select6" style="display:none">
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
<?php
require_once('footer.php');
?>
<script type="text/javascript">
   $('#l_date').datepicker({
       language: 'ru',
       startDate: '0d',
       todayHighlight: true,
       autoclose: true
  });
  $(document).on("change", "#l_st_id", function(){
    var a = $(this).val();
    if(a == 0){
        $(".data1").slideUp(200);
    } else {
        $("#select2").slideDown(200);
    }
  });

  $(document).on("change", "#l_s_id", function(){
    var a = $(this).val();
    if(a == 0){
        $(".data2, .data3, .data4").slideUp(200);
        $("#select3_data").slideUp(200);
        $("#select3_data").html('');
    } else {
        get_subject_teachers(a);
        $("#select3_data").slideDown(200);
        $(".data4").slideUp(200);
    }
  });

  $(document).on("change", "#l_t_id", function(){
    var a = $(this).val();
    if(a == 0){
        $("#select4_data").slideUp(200);
    } else {
        $("#select4_data").slideDown(200);
    }
  });

  $(document).on("change", "#l_date", function(){
    get_teacher_time_to_lesson();
  });    
</script>