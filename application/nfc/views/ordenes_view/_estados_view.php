<?php if($estado == 6): ?>
	<span class="label label-info"><?=$descripcion?></span>
<?php elseif($estado == 7): ?>
	<span class="label label-inverse"><?=$descripcion?></span>
<?php elseif($estado == 8): ?>
	<span class="label label-success"><?=$descripcion?></span>
<?php elseif($estado == 9): ?>
	<span class="label label-important"><?=$descripcion?></span>
<?php elseif($estado == 10): ?>
	<span class="label label-warning"><?=$descripcion?></span>
<?php endif;?>