<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>


            <div class="form-group">
              <label class="col-md-4 control-label">Выберите время</label>  
                <div class="col-md-8">
<?php while($row = $teacher_time_data->fetch_assoc()) { ?>
                    <div class="checkbox">
                       <label><input type="checkbox" class="time_checked" name="l_tt_id[]" value="<?=$row['tt_time_id']?>"><?=sprintf('%02d', $row['tt_hour_start']).':'.sprintf('%02d', $row['tt_minut_start']).' - '.sprintf('%02d', $row['tt_hour_end']).':'.sprintf('%02d', $row['tt_minut_end'])?></label>
                    </div>
<?php } ?>        
                </div>
            </div>

<hr>