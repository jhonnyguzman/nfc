<?=$this->load->view("default/_header_public")?>

<div class="row-fluid">
    <div class="span12">
		<?php if(isset($opmenu)) :?>
			<form action="<?=base_url()?>ordenes_public_controller/add_c?>" method="post" name="formEditopmenu" id="formEditopmenu">
				<ul class="thumbnails">
						<li class="span3">
							<div class="thumbnail">
								<img src="<?=base_url()."thumbs/".$opmenu->thumb?>">
								<div class="caption">
									<h4><?=$opmenu->nombre?></h4>
									<p>
										<?=$opmenu->descripcion?><br>
										<strong>Categoria: &nbsp;</strong><?=$categoria->descripcion?>&nbsp;&nbsp;&nbsp;&nbsp;
										<strong>Precio: $&nbsp;</strong><?=$opmenu->precio?></p>
										
										<label class="control-label" for="cantidad">Cantidad:</label>
										<input type="text" name="cantidad" id="cantidad"/>
									
										<label class="control-label" for="observacion">Observaci&oacute;n:</label>
										<textarea name="observacion" id="observacion"/></textarea>
										<label class="control-label" for="montototal">Total:</label>
										<input type="text" name="montototal" id="montototal" readonly="true"/>
										<input type="hidden" name="_id" id="_id" value="<?=$opmenu->_id?>"/>
										
									<p>
										<button type="submit" class="btn btn-primary">Ordenar</button>
									</p>
								</div>
							</div>
						</li>
				</ul>
			</form>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>
	</div>
</div>

<?=$this->load->view("default/_footer_public")?>