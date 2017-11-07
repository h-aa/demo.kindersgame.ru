<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>


            <div class="form-group">
              <label class="col-md-4 control-label">Выберите время</label>  
                <div class="col-md-8">
<?php 
foreach($free_time as $v) { 
    //foreach($val as $v){    
?>
                    <div class="checkbox">
                       <label><input type="checkbox" class="time_checked" name="l_tt_id[]" value="<?=$v['tt_time_id']?>"><?=sprintf('%02d', $v['tt_hour_start']).':'.sprintf('%02d', $v['tt_minut_start']).' - '.sprintf('%02d', $v['tt_hour_end']).':'.sprintf('%02d', $v['tt_minut_end'])?></label>
                    </div>
<?php } ?>        
                </div>
            </div>

<hr>