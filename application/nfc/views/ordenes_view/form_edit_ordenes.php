<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<form action="<?=base_url()?>ordenes_controller/edit_c/<?=$ordenes->_id?>" method="post" name="formEditordenes" id="formEditordenes" class="form-horizontal">
		<input type="hidden" name="precio" id="precio" value="<?=$ordenes->opmenu_precio?>">
		<div class="control-group">
			<label class="control-label"  for="_id"><?=$this->config->item('_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$ordenes->_id?>" name="_id" id="_id"  readonly="readonly"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="mesas_descripcion"><?=$this->config->item('mesas_descripcion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$ordenes->mesas_descripcion?>" name="mesas_descripcion" id="mesas_descripcion" readonly="true"/>
				<input type="hidden" value="<?=$ordenes->mesas_id?>" name="mesas_id" id="mesas_id"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="opmenu_nombre"><?=$this->config->item('opmenu_nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$ordenes->opmenu_nombre?>" name="opmenu_nombre" id="opmenu_nombre" readonly="true"/>
				<input type="hidden" value="<?=$ordenes->opmenu_id?>" name="opmenu_id" id="opmenu_id"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="cantidad"><?=$this->config->item('cantidad')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$ordenes->cantidad?>" name="cantidad" id="cantidad" onChange="calcTotal(<?=$ordenes->opmenu_precio?>)"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="montotal"><?=$this->config->item('montotal')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$ordenes->montotal?>" name="montotal" id="montotal"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<select name="estado" id="estado" >
					<?php foreach($estados as $f): ?>
						<?php if($f->_id == $ordenes->estado): ?>
							<option value="<?=$f->_id?>" selected><?=$f->descripcion?></option>
						<?php else: ?>
							<option value="<?=$f->_id?>"><?=$f->descripcion?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="observacion"><?=$this->config->item('observacion')?>:</label>
			<div class="controls">
				<textarea name="observacion" id="observacion"><?=$ordenes->observacion?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="mesas_id"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$ordenes->created_at?>" name="created_at" id="created_at" readonly="true" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$ordenes->updated_at?>" name="updated_at" id="updated_at" readonly="true"/>
			</div>
		</div>

		<div class="form-actions">
			<a href="<?=base_url()?>ordenes_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
