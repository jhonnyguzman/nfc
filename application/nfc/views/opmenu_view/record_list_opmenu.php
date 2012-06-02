
		<?php if(isset($opmenu) && is_array($opmenu) && count($opmenu)>0):?>
			<ul class="thumbnails">
				<?php foreach($opmenu as $f):?>
					<li class="span3">
						<div class="thumbnail">
							<img src="<?=base_url()."thumbs/".$f->thumb?>">
							<div class="caption">
								<h5><?=$f->nombre?></h5>
								<p>
									<strong><?=$f->descripcion?></strong>
									<?=$f->precio?>
									<?=$f->categoria_descripcion?>
								</p>
								<p>
									<?php if($flag['u']):?>
										<a href="<?=base_url()?>opmenu_controller/edit_c/<?=$f->_id?>" class="btn btn-primary">Modificar</a>
									<?php endif;?>
									<?php if($flag['d']):?>
										<a href="#"  onClick="deleteRow('<?=base_url()?>opmenu_controller/delete_c/<?=$f->_id?>')" class="btn btn-primary">Eliminar</a>
									<?php endif;?>
								</p>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-opmenu">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-opmenu','result-list'); 
	});
</script>
