<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
<ul class="pagination">
	<li><a href="/view/">«</a></li>
	<?php for($x = 1; $x<=$num_pagination;$x++){?>
	<li <?=($x == $active_number ? 'class="active"' : '')?>><a href="/view/<?=$x?>"><?=$x?></a></li>
	<?php }?>	
	<li><a href="/view/<?=$num_pagination?>">»</a></li>
</ul>

