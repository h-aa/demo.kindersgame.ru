<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>


            <div class="form-group">
              <label class="col-md-4 control-label">Предметы</label>  
                <div class="col-md-8">
<?php while($row = $subject_data->fetch_assoc()) { ?>
                    <div class="checkbox">
                       <label><input type="checkbox" name="subject[]" value="<?=$row['s_id']?>" <?=$this->checkTeacherSubject($t_id, $row['s_id'])?>><?=$row['s_name']?></label>
                    </div>
<?php } ?>        
                </div>
            </div>

<hr>