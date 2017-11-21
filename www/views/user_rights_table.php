<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>


            <div class="form-group" id="rights_data" style="<?=isset($u_type) && $u_type == 2 ? 'display:none' : ''?>">
              <label class="col-md-4 control-label">Права</label>  
                <div class="col-md-8">
<?php while($row = $rights_data->fetch_assoc()) { ?>
                    <div class="checkbox">
                       <label><input type="checkbox" name="rights[]" value="<?=$row['r_id']?>" <?=$this->checkUserRight($u_id, $row['r_id'])?>><?=$row['r_name']?></label>
                    </div>
<?php } ?>        
                </div>
            </div>

<hr>