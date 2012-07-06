
		<?php if(isset($ordenes) && is_array($ordenes) && count($ordenes)>0):?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Mesa</th>
						<th>Menu</th>
						<th>Cantidad</th>
						<th>Monto total</th>
						<th>Estado</th>
						<th>Observaci&oacute;n</th>
						<th>Fecha alta</th>
					</tr>
				</thead>
				<tbodoy>
					<?php foreach($ordenes as $f):?>
						<tr>
							<td><?=$f->_id?></td>
							<td><?=$f->mesas_descripcion?></td>
							<td><?=$f->opmenu_nombre?></td>
							<td><?=$f->cantidad?></td>
							<td>$&nbsp;<?=$f->montotal?></td>
							<td><?=$this->load->view('ordenes_view/_estados_view', array('estado' => $f->estado, 'descripcion' => $f->estado_descripcion))?></td>
							<td><?=$f->observacion?></td>
							<td>Hace &nbsp;<?=$f->created_at?></td>
							<td>
								<?php if($flag['u']):?>
									<a href="<?=base_url()?>ordenes_controller/edit_c/<?=$f->_id?>" title="Modificar">Modificar</a>
								<?php endif;?>
								<?php if($flag['d']):?>
									<a href="#"  onClick="deleteRow('<?=base_url()?>ordenes_controller/delete_c/<?=$f->_id?>')" title="Eliminar">Eliminar</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-ordenes">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>

<script>
	$(document).ready(function(){ 
		setPagination('pag-ordenes','result-list'); 
	});
</script>
