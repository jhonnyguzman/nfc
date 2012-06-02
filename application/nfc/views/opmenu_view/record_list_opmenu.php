
		<?php if(isset($opmenu) && is_array($opmenu) && count($opmenu)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripci&oacute;n</th>
						<th>Precio</th>
						<th>Categoria</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($opmenu as $f):?>
						<tr>
							<td><?=$f->nombre?></td>
							<td><?=$f->descripcion?></td>
							<td><?=$f->precio?></td>
							<td><?=$f->categoria_descripcion?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>opmenu_controller/edit_c/<?=$f->_id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>opmenu_controller/delete_c/<?=$f->_id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
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
