<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('views/header.php');
//$this->help->printPost();
?>
            <center><h2>Расписание занятий:</h2>
            <?php
            if($this->auth->isAdmin() || $this->auth->userRights(10)){                
            ?>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline" role="form" method="post" action="/">
                        <div class="form-group">
                            <label class="sr-only" for="date_start">Начало</label>
                            <input type="text" class="form-control date" name="date_start" id="date_start" value="<?=$_POST['date_start'] ? $_POST['date_start'] : ''?>" placeholder="Начальная дата">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="date_end">Конец</label>
                            <input type="text" class="form-control date" name="date_end" id="date_end" value="<?=$_POST['date_end'] ? $_POST['date_end'] : ''?>" placeholder="Конечная дата">
                        </div>                
                        <button type="submit" class="btn btn-default">За период</button>
                    </form>  
                </div>
            </div>
            <?php } ?>
             </center><hr>             
<?php            
	    for($a = $start_date; $a <= $end_date; $a = $a + 86400)
        {
            $num_day            = date("w", $a);
            $num_day            = $num_day == 0 ? 7 : $num_day;
            $day_of_week        = $this->help->dayWeek($num_day);
            $date               = date("d.m", $a);
            $date_full          = date("d.m.Y", $a);
            $teachers           = $this->model->getTeachersActive();
            $max_lessons_data   = $this->model->maxLessonsInDay($num_day);
            $max_lessons_data   = $max_lessons_data->fetch_assoc();
            if(!$max_lessons_data['num'])
            {
                continue;
            }
?>
            <?=$day_of_week == 1 ? '<hr>' : ''?>
			<div class="row event" id="print_<?=$a?>"> <!-- мероприятие -->
				<div class="col-md-2 time">
					<span class="daysc"><?=$date?></span>
					<span class="monthsc"><?=$day_of_week?></span>
            <?php
            if($this->auth->isAdmin() || $this->auth->userRights(10)){                
            ?>                    
                    <br>
                    <button class="btn btn-default" onclick="printDiv('print_<?=$a?>')"><i class="fa fa-print" aria-hidden="true" style="font-size: 17px;"></i></button>
            <?php } ?>        
				</div>
				<div class="col-md-10">
					<h3><!--Расписание занятий--></h3>
					<div class="table-responsive">
                    <table class="table table-condensed table-bordered table-hover">
					<tr>
					<?php
                        $teachers_id = ''; 
                        while($teacher = $teachers->fetch_assoc())
                        {
                            $teachers_id[] = $teacher['t_id'];
                            $teacher_lessons = $this->model->getTeacherSubject($teacher['t_id']);
                            echo '<th class="text-center">'.$teacher['t_second_name'].' '.$teacher['t_first_name'].' '.$teacher['t_third_name'].'<p class="text-muted">';
                            while($teacher_lesson = $teacher_lessons->fetch_assoc())
                            {
                                echo ' <em>'.$teacher_lesson['s_name'].' </em>';
                            }
                            echo '</p></th>';
                        }
                    ?>

					</tr>
                    <?php
                        for($num_lessons = 0; $num_lessons < $max_lessons_data['num']; $num_lessons++)
                        {
                            echo '<tr>';
                                foreach($teachers_id as $t_id)
                                {
                                    $lesson_time = $this->model->teacherTimeLesson($t_id, $num_day, $num_lessons);
                                    if($lesson_time->num_rows === 0)
                                    {
                                        echo '<td align="center">-</td>';
                                    } else {
                                        $l_data = $lesson_time->fetch_assoc();
                                        $unix_time_start = strtotime($date_full.' '.$l_data['tt_hour_start'].':'.$l_data['tt_minut_start']);
                                        echo '<td align="center"><i class="fa fa-clock-o fa-lg"></i> <b>'.sprintf('%02d', $l_data['tt_hour_start']).':'.sprintf('%02d', $l_data['tt_minut_start']).'-'.sprintf('%02d', $l_data['tt_hour_end']).':'.sprintf('%02d', $l_data['tt_minut_end']).'</b><br>';
                                        $lesson_students = $this->model->getDataLesson($t_id, $date_full, $l_data['tt_hour_start'], $l_data['tt_hour_end'], $l_data['tt_minut_start'], $l_data['tt_minut_end']);
                                        $n = 0;
                                        while($row = $lesson_students->fetch_assoc())
                                        {
                                            echo '';
                                            echo '<em>'.$row['st_second_name'].' '.$row['st_first_name'].' '.$row['st_third_name'].'<br><span class="text-muted"> ('.$row['s_name'].')</span></em>';
                                            if(($this->auth->isAdmin() || $this->auth->userRights(2)) && strtotime("now") < $unix_time_start)
                                            {
                                                echo '<br><a class="btn btn-danger btn-block btn-xs button-block" href="/lesson_del/'.$row['l_id'].'" role="button">Удалить</a>';
                                            }
                                            echo '<br>';
                                            $n++;
                                        }
                                        //размещение или не размещение кнопки добавления занятия в Расписание
                                        
                                        if(($this->auth->isAdmin() || $this->auth->userRights(1)) && strtotime("now") < $unix_time_start){
                                            if($n == 0)
                                            {
                                                ?>
                                                 <div class="button-block">
                                                    <form action="/lesson_add_from_schedule" method="post">
                                                    <input type="hidden" name="l_t_id" value="<?=$t_id?>">
                                                    <input type="hidden" name="l_date" value="<?=$date_full?>">
                                                    <input type="hidden" name="l_tt_id" value="<?=$l_data['tt_time_id']?>">
                                                    <button type="submit" id="btn" class="btn btn-success btn-block btn-xs button-add">Добавить</button>
                                                    </form>
                                                </div>
                                                <?php
                                            } else {
                                                $teacher_lessons_active = $this->model->getTeacherSubjectGroup($t_id);
                                                if($teacher_lessons_active->num_rows > 0)
                                                {
                                                ?>
                                                    <div class="button-block">
                                                        <form action="/lesson_add_from_schedule" method="post">
                                                        <input type="hidden" name="l_t_id" value="<?=$t_id?>">
                                                        <input type="hidden" name="l_date" value="<?=$date_full?>">
                                                        <input type="hidden" name="l_tt_id" value="<?=$l_data['tt_time_id']?>">
                                                        <button type="submit" id="btn" class="btn btn-success btn-block btn-xs button-add">Добавить</button>
                                                        </form>
                                                    </div>
                                                <?php                                                
                                                }
                                            }
                                        }
                                        echo '</td>';
                                    }   
                                }
                            echo '</tr>';
                        }
                    ?>
					</table>
                    </div>
				</div>
			</div>

<?php
        }
$this->help->error();       
require_once('views/footer.php');
?>
<script type="text/javascript">
$('#date_start, #date_end').datepicker({
       language: 'ru',
       //startDate: '0d',
       todayHighlight: true,
       autoclose: true
});
</script>