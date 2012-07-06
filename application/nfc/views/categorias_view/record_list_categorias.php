
		<?php if(isset($categorias) && is_array($categorias) && count($categorias)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Descripci&oacute;n</th>
						<th>Fecha de alta</th>
						<th></th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($categorias as $f):?>
						<tr>
							<td><?=$f->descripcion?></td>
							<td><?=$f->created_at?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>categorias_controller/edit_c/<?=$f->_id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>categorias_controller/delete_c/<?=$f->_id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-categorias">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-categorias','result-list'); 
	});
</script>
