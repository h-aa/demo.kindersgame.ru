<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
                      <?php while($city = $all_city->fetch_assoc()){?>
                        <option value="<?=$city['city_id']?>"><?=$city['city_name']?></option>
                      <?php }?>

