<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
$time_in_table = 0;
?>
<?php 
while($row = $teacher_time_data->fetch_assoc()){ 
$time_in_table++;    
?>
<tr>
    <td><i class="fa fa-clock-o fa-lg"></i> 
    <select name="time_data[<?=$num_day?>][<?=$time_in_table?>][tt_hour_start]">
<?php 
    for($d=7;$d<23;$d++){
        $selected = $row['tt_hour_start'] == $d ? " selected" : "";
        echo '<option value="'.$d.'" '.$selected.'>'.sprintf('%02d', $d).'</option>';
    }
?>
    </select>:<select name="time_data[<?=$num_day?>][<?=$time_in_table?>][tt_minut_start]">
<?php 
    for($d=0;$d<60;$d++){
        $selected = $row['tt_minut_start'] == $d ? " selected" : "";
        echo '<option value="'.$d.'" '.$selected.'>'.sprintf('%02d', $d).'</option>';
    }
?>
    </select> - <select name="time_data[<?=$num_day?>][<?=$time_in_table?>][tt_hour_end]">
<?php 
    for($d=7;$d<23;$d++){
        $selected = $row['tt_hour_end'] == $d ? " selected" : "";
        echo '<option value="'.$d.'" '.$selected.'>'.sprintf('%02d', $d).'</option>';
    }
?>
    </select>:<select name="time_data[<?=$num_day?>][<?=$time_in_table?>][tt_minut_end]">
<?php 
    for($d=0;$d<60;$d++){
        $selected = $row['tt_minut_end'] == $d ? " selected" : "";
        echo '<option value="'.$d.'" '.$selected.'>'.sprintf('%02d', $d).'</option>';
    }
?>
    </select> <i class="fa fa-minus-circle fa-lg time_del_btn"></i>
<?php $checked = $row['tt_active'] == '1' ? " checked" : "";?>
    <div class="checkbox"><label><input type="checkbox" name="time_data[<?=$num_day?>][<?=$time_in_table?>][tt_active]" value="1" <?=$checked?>> Активно</label></div>
    </td>
</tr>
<?php 
} 
?>