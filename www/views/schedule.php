<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('views/header.php');
?>
            <center><h2>Расписание занятий:</h2></center>
            <hr>
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
			<div class="row event"> <!-- мероприятие -->
				<div class="col-md-2 time">
					<span class="daysc"><?=$date?></span>
					<span class="monthsc"><?=$day_of_week?></span>
				</div>
				<div class="col-md-10">
					<h3><!--Расписание занятий--></h3>
					<div class="table-responsive">
                    <table class="table table-condensed table-bordered table-hover ">
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
                                        echo '<td align="center"><i class="fa fa-clock-o fa-lg"></i> <b>'.sprintf('%02d', $l_data['tt_hour_start']).':'.sprintf('%02d', $l_data['tt_minut_start']).'-'.sprintf('%02d', $l_data['tt_hour_end']).':'.sprintf('%02d', $l_data['tt_minut_end']).'</b><br>';
                                        $lesson_students = $this->model->getDataLesson($t_id, $date_full, $l_data['tt_hour_start'], $l_data['tt_hour_end'], $l_data['tt_minut_start'], $l_data['tt_minut_end']);
                                        while($row = $lesson_students->fetch_assoc())
                                        {
                                            echo '';
                                            echo '<em>'.$row['st_second_name'].' '.$row['st_first_name'].' '.$row['st_third_name'].'<br><span class="text-muted"> ('.$row['s_name'].')</span></em>';
                                            if($this->auth->isAdmin())
                                            {
                                                //echo '<i class="fa fa-minus-circle fa-lg time_del_btn"></i>';
                                                echo '<br><a class="btn btn-danger btn-xs" href="/lesson_del/'.$row['l_id'].'" role="button">Удалить</a>';
                                            }
                                            echo '<br>';
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
require_once('views/footer.php');
?>