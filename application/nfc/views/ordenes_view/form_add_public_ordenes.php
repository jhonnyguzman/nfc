<?=$this->load->view("default/_header_public")?>

<div class="row-fluid">
    <div class="span12">
    	<?php if(validation_errors() || isset($error)): ?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert" href="#">×</a>
				<?=validation_errors()?>
			</div>		
		<?php endif; ?>
		<?php if(isset($opmenu)) :?>
			<form action="<?=base_url()?>ordenes/nueva/<?=$mesas_id?>/<?=$categoria->_id?>/<?=$opmenu->_id?>" 
				method="post" name="formNewOrden" id="formNewOrden">
				<input type="hidden" name="formID" id="formID" value="<?=$this->session->set_userdata('formID', random_string('unique'))?>" />
				<ul class="thumbnails">
						<li class="span12">
							<div class="thumbnail">
								<img src="<?=base_url()."thumbs/".$opmenu->thumb?>">
								<div class="caption">
									<h4><?=$opmenu->nombre?></h4>
									<p>
										<?=$opmenu->descripcion?><br>
										<strong>Categoria: &nbsp;</strong><?=$categoria->descripcion?>&nbsp;&nbsp;&nbsp;&nbsp;
										<strong>Precio: $&nbsp;</strong><?=$opmenu->precio?>
									</p>
										
									<label class="control-label" for="cantidad"><strong>Cantidad:</strong></label>
									<input type="text" name="cantidad" id="cantidad" onChange="calcTotal(<?=$opmenu->precio?>)"/>
								
									<label class="control-label" for="observacion"><strong>Observaci&oacute;n:</strong></label>
									<textarea name="observacion" id="observacion"/></textarea>
									<label class="control-label" for="montototal"><strong>Total:</strong></label>
									<input type="text" name="montotal" id="montotal" readonly="true"/>
									<input type="hidden" name="opmenu_id" id="opmenu_id" value="<?=$opmenu->_id?>"/>
									<input type="hidden" name="mesas_id" id="mesas_id" value="<?=$mesas_id?>"/>
									<input type="hidden" name="precio" id="precio" value="<?=$opmenu->precio?>"/>
										
									<p>
										<button type="submit" class="btn btn-large btn-primary ">Enviar Orden</button>
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