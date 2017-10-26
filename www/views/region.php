<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
                      <?php while($region = $all_region->fetch_assoc()){?>
                        <option value="<?=$region['region_id']?>"><?=$region['region_name']?></option>
                      <?php }?>

